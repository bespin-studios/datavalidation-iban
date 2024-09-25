<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Checksum\ChecksumInterface;
use Bespin\DataValidation\Iban\Checksum\Mod97_10;
use Bespin\DataValidation\Iban\Data\SubString;

abstract class CountryParent implements CountryInterface
{
    public function __construct(
        private readonly string     $country,
        private readonly string     $countryCode,
        private readonly bool       $sepa,
        private readonly int        $length,
        private readonly string     $regex,
        private readonly ?SubString $bankIdentifier,
        private readonly ?SubString $branchIdentifier,
        private readonly ?SubString $accountNumber,
    )
    {
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function isSepa(): bool
    {
        return $this->sepa;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getRegex(): string
    {
        return $this->regex;
    }

    public function getChecksumInstance(): ChecksumInterface
    {
        return new Mod97_10();
    }

    public function getBankIdentifier(): ?SubString
    {
        return $this->bankIdentifier;
    }

    public function getBranchIdentifier(): ?SubString
    {
        return $this->branchIdentifier;
    }

    public function getAccountNumber(): ?SubString
    {
        return $this->accountNumber;
    }
}