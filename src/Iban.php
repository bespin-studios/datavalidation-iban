<?php

namespace Bespin\IBAN;

use Bespin\IBAN\Countries\CountryInterface;
use Exception;
use Throwable;

class Iban
{
    public static function verify(string $iban, bool $isAlreadyMachineFormat = false): bool
    {
        if ($isAlreadyMachineFormat === false) {
            try {
                $iban = self::format($iban);
            } catch (Throwable) {
                // failure to format the iban is automatically an invalid iban
                return false;
            }
        }
        $country = self::getCountryObject($iban);
        if ($country === null) {
            return false;
        }

        // check length
        if (strlen($iban) !== $country->getLength()) {
            return false;
        }

        // check format
        if (preg_match($country->getRegex(), $iban)) {
            // check checksum
            return $country->getChecksumInstance()->checksum($iban);
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public static function format(string $iban, Format $format = Format::machine, bool $isAlreadyMachineFormat = false): string
    {
        if ($format === Format::machine) {
            if ($isAlreadyMachineFormat) {
                return $iban;
            }
            $iban = preg_replace('/[^a-zA-Z0-9]/', '', ltrim(strtoupper($iban)));
            if ($iban === null) {
                throw new Exception('failed to format IBAN');
            }
            return $iban;
        } else {
            if ($isAlreadyMachineFormat) {
                return wordwrap($iban, 4, ' ', true);
            }
            return wordwrap(self::format($iban), 4, ' ', true);
        }
    }

    /**
     * @param string $iban
     * @param bool $isAlreadyMachineFormat
     * @return string
     * @throws Exception
     */
    public static function getBasicBankAccountNumber(string $iban, bool $isAlreadyMachineFormat = false): string
    {
        if ($isAlreadyMachineFormat === false) {
            $iban = self::format($iban);
        }
        return substr($iban, 4);
    }

    /**
     * @param string $iban
     * @param bool $verify
     * @param bool $isAlreadyMachineFormat
     * @return string|null
     * @throws Exception
     */
    public static function getBankIdentifier(string $iban, bool $verify = false, bool $isAlreadyMachineFormat = false): ?string
    {
        $basicBankAccountNumber = self::getBasicBankAccountNumber($iban, $isAlreadyMachineFormat);
        $country                = self::getCountryObject($iban);
        if ($country === null) {
            return null;
        }
        $subStr = $country->getBankIdentifier();
        if ($subStr === null) {
            return null;
        }
        $bankIdentifier = substr($basicBankAccountNumber, $subStr->offset, $subStr->length);
        if ($verify === true) {
            if (preg_match($subStr->pattern, $bankIdentifier)) {
                return $bankIdentifier;
            }
            throw new Exception('failed to verify Bank Identifier');
        }
        return $bankIdentifier;
    }

    /**
     * @param string $iban
     * @param bool $verify
     * @param bool $isAlreadyMachineFormat
     * @return string|null
     * @throws Exception
     */
    public static function getBranchIdentifier(string $iban, bool $verify = false, bool $isAlreadyMachineFormat = false): ?string
    {
        $basicBankAccountNumber = self::getBasicBankAccountNumber($iban, $isAlreadyMachineFormat);
        $country                = self::getCountryObject($iban);
        if ($country === null) {
            return null;
        }
        $subStr = $country->getBranchIdentifier();
        if ($subStr === null) {
            return '';
        }
        $bankIdentifier = substr($basicBankAccountNumber, $subStr->offset, $subStr->length);
        if ($verify === true) {
            if (preg_match($subStr->pattern, $bankIdentifier)) {
                return $bankIdentifier;
            }
            throw new Exception('failed to verify Branch Identifier');
        }
        return $bankIdentifier;
    }

    private static function getCountryObject(string $machineIban): ?CountryInterface
    {
        $country   = substr($machineIban, 0, 2);
        $className = '\\Bespin\\IBAN\\Countries\\Country'.$country;
        if (class_exists($className)) {
            $countryObject = new $className();
            if ($countryObject instanceof CountryInterface) {
                return $countryObject;
            }
        }
        return null;
    }
}