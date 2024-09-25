<?php

namespace Bespin\DataValidation\Iban\Data;

use DateTime;
use DateTimeZone;
use Exception;
use Throwable;

class SwiftParser
{
    /**
     * @throws Exception
     */
    public static function parse(string|bool $fileContents): void
    {
        if (is_bool($fileContents)) {
            throw new Exception('File contents not provided');
        }
        $bbanFixes        = RegistryCorrections::getBbanCorrections();
        $territoryMapping = RegistryCorrections::getTerritories();
        $dataArray        = self::flipDimension($fileContents);
        $entries          = [];
        array_shift($dataArray);
        foreach ($dataArray as $swiftDataEntry) {
            $countryElements = null;
            $bbanElements    = null;
            $ibanElements    = null;
            $date            = null;
            // first 6 rows should be the country relevant information, the 7th row should be the header row "BBAN" with an empty value
            if ($swiftDataEntry[7] === '') {
                $countryElements = array_splice($swiftDataEntry, 1, 6);
                $swiftDataEntry  = array_splice($swiftDataEntry, 2);
                $countryPrefix   = $countryElements[1];

                // due to swift incompetence, bban can be 8-10 elements long, let's try to find the start of the iban section
                $probableIndexOfIban = self::getProbableIndexOfIbanSection($swiftDataEntry, $countryPrefix);

                if ($probableIndexOfIban !== null && $swiftDataEntry[$probableIndexOfIban - 1] === '') {
                    $bbanElements = array_splice($swiftDataEntry, 0, $probableIndexOfIban - 1);
                    if ($swiftDataEntry[6] === '') {
                        $ibanElements = array_splice($swiftDataEntry, 1, 5);

                        // remaining array entries are the contact details and the update date
                        foreach (array_reverse($swiftDataEntry) as $v) {
                            if (!empty($v)) {
                                try {
                                    $date = DateTime::createFromFormat('!d-M-y', '01-'.$v, new DateTimeZone('UTC'));
                                } catch (Throwable) {
                                }
                                break;
                            }
                        }
                    }
                }

                // all relevant information found, add it to the entries array
                if ($bbanElements !== null && $ibanElements !== null && $date instanceof DateTime) {
                    if (array_key_exists($countryPrefix, $bbanFixes)) {
                        $bbanElements = $bbanFixes[$countryPrefix];
                    }
                    $countryData = new CountryData(...$countryElements);
                    if (array_key_exists($countryData->getPrefix(), $entries)) {
                        throw new Exception('Duplicate country prefix: '.$countryData->getPrefix());
                    }
                    $entries[$countryData->getPrefix()] = new DataEntry($countryData, new BbanData($bbanElements), new IbanData(...$ibanElements), $date);
                    foreach ($countryData->getIncludedTerritories() as $includedTerritory) {
                        if (array_key_exists($includedTerritory, $territoryMapping)) {
                            $prefix     = array_key_exists('Prefix', $territoryMapping[$includedTerritory]) ? $territoryMapping[$includedTerritory]['Prefix'] : $includedTerritory;
                            $mappedData = [
                                $territoryMapping[$includedTerritory]['Country'],
                                $prefix,
                                '',
                                $countryData->territoryUsesSEPA($prefix) ? 'Yes' : 'No',
                                '',
                                $countryData->getAccountNumberExample()
                            ];
                            if (array_key_exists($prefix, $entries)) {
                                throw new Exception('Duplicate country prefix: '.$prefix);
                            }
                            $entries[$prefix] = new DataEntry(new CountryData(...$mappedData), new BbanData($bbanElements), new IbanData(...$ibanElements), $date);
                        } else {
                            throw new Exception("Unknown territory: ".$includedTerritory.' (Parent Country: '.$countryData->getCountry().')');
                        }
                    }
                } else {
                    throw new Exception('Could not determine bban and/or iban for country: '.$countryElements[0]);
                }
            }
        }
        self::generateCountryClasses($entries);
    }

    /**
     * @param array<DataEntry> $dataEntries
     * @return void
     */
    private static function generateCountryClasses(array $dataEntries): void
    {
        foreach ($dataEntries as $dataEntry) {
            $dataEntry->generateClassFile();
        }
    }

    /**
     * @param array<int, string> $swiftDataEntry
     * @param string $countryPrefix
     * @return int|null
     */
    private static function getProbableIndexOfIbanSection(array $swiftDataEntry, string $countryPrefix): ?int
    {
        foreach ($swiftDataEntry as $k => $v) {
            if (str_starts_with($v, $countryPrefix)) {
                return $k;
            }
        }
        return null;
    }

    /**
     * @param string $ibanRegistryContents
     * @return array<int, array<int, string>>
     */
    private static function flipDimension(string $ibanRegistryContents): array
    {
        $result = [];
        $lines  = explode("\n", $ibanRegistryContents);
        foreach ($lines as $lineIndex => $line) {
            $columns = explode("\t", $line);
            foreach ($columns as $columnIndex => $column) {
                $result[$columnIndex][$lineIndex] = trim($column);
            }
        }
        return $result;
    }
}