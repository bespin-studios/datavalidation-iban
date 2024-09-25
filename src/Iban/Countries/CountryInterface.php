<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Checksum\ChecksumInterface;
use Bespin\DataValidation\Iban\Data\SubString;

interface CountryInterface
{
    public function getLength(): int;

    public function getRegex(): string;

    public function getChecksumInstance(): ChecksumInterface;

    public function getBankIdentifier(): ?SubString;

    public function getBranchIdentifier(): ?SubString;

    public function getAccountNumber(): ?SubString;
}