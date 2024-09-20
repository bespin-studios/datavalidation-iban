<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Checksum\ChecksumInterface;
use Bespin\IBAN\Data\SubString;

interface CountryInterface
{
    public function getLength(): int;

    public function getRegex(): string;

    public function getChecksumInstance(): ChecksumInterface;

    public function getBankIdentifier(): ?SubString;

    public function getBranchIdentifier(): ?SubString;

    public function getAccountNumber(): ?SubString;
}