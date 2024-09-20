<?php

namespace Bespin\IBAN\Data;

use Exception;

class BbanData
{
    private string $swiftFormat;
    private string $pattern;
    private string $length;
    private string $example;
    private string $bankIdentifierPosition;
    private string $bankIdentifierSwiftFormat;
    private string $bankIdentifierPattern;
    private string $bankIdentifierExample;
    private string $branchIdentifierPosition;
    private string $branchIdentifierSwiftFormat;
    private string $branchIdentifierPattern;
    private string $branchIdentifierExample;

    /**
     * @param array<string> $dataArray
     * @throws Exception
     */
    public function __construct(array $dataArray)
    {
        foreach ($dataArray as $key => $value) {
            if ($value === 'N/A') {
                $dataArray[$key] = '';
            }
        }
        if (count($dataArray) === 10) {
            // the bank identifier range is messed up and has two entries
            $bankIndexLength = 3;
        } elseif (count($dataArray) === 9) {
            // this should be the correct array
            $bankIndexLength = 2;
        } elseif (count($dataArray) === 8) {
            // bankIdentifierPosition missing
            $bankIndexLength = 1;
        } else {
            throw new Exception('Invalid number of array elements');
        }

        $bankArray   = array_merge(array_splice($dataArray, 2, $bankIndexLength), array_splice($dataArray, 4, 1));
        $bbanArray   = array_merge(array_splice($dataArray, 0, 2), array_splice($dataArray, 3, 1));
        $branchArray = $dataArray;

        $this->setBasicData(...$bbanArray);
        $this->setBranchData(...$branchArray);
        $this->setBankIdentifierData(...$this->fixBankIdentifierData($bankArray));
    }

    public function getBankIdentifier(): string
    {
        $positionParts = explode('-', $this->bankIdentifierPosition);
        $offset = array_key_exists(0, $positionParts) ? intval($positionParts[0]) : null;
        $length = array_key_exists(1, $positionParts) ? intval($positionParts[1]) : null;
        return $this->getSubString($offset, $length, $this->bankIdentifierPattern);
    }

    public function getBranchIdentifier(): string
    {
        $positionParts = explode('-', $this->branchIdentifierPosition);
        $offset = array_key_exists(0, $positionParts) ? intval($positionParts[0]) : null;
        $length = array_key_exists(1, $positionParts) ? intval($positionParts[1]) : null;
        return $this->getSubString($offset, $length, $this->branchIdentifierPattern);
    }

    public function getAccountNumber(): string
    {
        return 'null';
    }

    private function getSubString(?int $offset, ?int $length, ?string $pattern): string
    {
        if ($offset === null || $length === null || $pattern === null) {
            return 'null';
        }
        $offset--;
        $length = $length - $offset;
        return 'new SubString(offset: '.$offset.', length: '.$length.', pattern: \''.$pattern.'\')';
    }

    /** @throws Exception */
    private function setBasicData(string $swiftFormat, string $length, string $example): void
    {
        $this->swiftFormat = $swiftFormat;
        $this->length      = $length;
        $this->example     = $example;
        $this->pattern     = SwiftFormatConverter::convert($swiftFormat);
    }

    /** @throws Exception */
    private function setBranchData(string $position, string $swiftFormat, string $example): void
    {
        $this->branchIdentifierPosition    = $position;
        $this->branchIdentifierSwiftFormat = $swiftFormat;
        $this->branchIdentifierExample     = $example;
        $this->branchIdentifierPattern     = SwiftFormatConverter::convert($swiftFormat);
    }

    /** @throws Exception */
    private function setBankIdentifierData(string $position, string $swiftFormat, string $example): void
    {
        $this->bankIdentifierPosition    = $position;
        $this->bankIdentifierSwiftFormat = $swiftFormat;
        $this->bankIdentifierExample     = $example;
        $this->bankIdentifierPattern     = SwiftFormatConverter::convert($swiftFormat);
    }

    /**
     * @param array<string> $bankIdentifierData
     * @return array<string>
     * @throws Exception
     */
    private function fixBankIdentifierData(array $bankIdentifierData): array
    {
        switch (count($bankIdentifierData)) {
            case 2:
                return [
                    $bankIdentifierData[0],
                    self::getPositionString($bankIdentifierData[0], $bankIdentifierData[1], $this->swiftFormat, $this->example),
                    $bankIdentifierData[1]
                ];
            case 4:
                if ($bankIdentifierData[0] === $bankIdentifierData[1]) {
                    // duplicate length entry
                    array_splice($bankIdentifierData, 1, 1);
                    return $bankIdentifierData;
                }
                $length  = self::getLength($bankIdentifierData[2]);
                $example = str_replace('-', '', $bankIdentifierData[3]);
                $strlen  = strlen($example);
                if ($strlen === $length) {
                    $length2 = 0;
                    $length3 = 0;
                    $index2  = explode('-', $bankIdentifierData[0]);
                    $index3  = explode('-', $bankIdentifierData[1]);
                    if (count($index2) === 2) {
                        $length2 = intval($index2[1]) - (intval($index2[0]) - 1);
                    }
                    if (count($index3) === 2) {
                        $length3 = intval($index3[1]) - (intval($index3[0]) - 1);
                    }
                    if ($length2 === $length3) {
                        throw new Exception('Unable to determine bank identifier length (1)');
                    } elseif ($length2 === $length) {
                        array_splice($bankIdentifierData, 1, 1);
                        return $bankIdentifierData;
                    } elseif ($length3 === $length) {
                        array_splice($bankIdentifierData, 2, 1);
                        return $bankIdentifierData;
                    } else {
                        $bankIdentifierData[0] = self::getPositionString($bankIdentifierData[2], $bankIdentifierData[3], $this->swiftFormat, $this->example);
                        array_splice($bankIdentifierData, 1, 1);
                        return $bankIdentifierData;
                    }
                }
                throw new Exception('Unable to determine bank identifier length (2)');
            default:
                return $bankIdentifierData;
        }
    }

    /** @throws Exception */
    private static function getPositionString(string $subFormat, string $subExample, string $swiftFormat, string $example): string
    {
        $subExample = str_replace('-', '', $subExample);
        // Use preg_match_all to split the pattern based on the regex
        preg_match_all('/\d+!\w/', $swiftFormat, $matches);

        // The resulting array will be in $matches[0]
        $splitArray = $matches[0];
        $regex      = SwiftFormatConverter::convert($swiftFormat);
        preg_match('/^'.$regex.'$/', $example, $partMatches);
        array_splice($partMatches, 0, 1);

        if (count($partMatches) === count($splitArray)) {
            $prefix = '';
            foreach ($splitArray as $key => $part) {
                if ($part === $subFormat && $partMatches[$key] === $subExample) {
                    return (strlen($prefix) + 1).'-'.(strlen($prefix) + strlen($partMatches[$key]));
                }
                $prefix .= $partMatches[$key];
            }
        }
        throw new Exception('Invalid swift format');
    }

    private static function getLength(string $swiftFormat): int
    {
        $result = 0;
        foreach (explode('!', $swiftFormat) as $part) {
            $result += intval(preg_replace('/\D/', '', $part));
        }
        return $result;
    }
}