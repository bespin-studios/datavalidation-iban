<?php

namespace Bespin\DataValidation\Iban\Checksum;

interface ChecksumInterface
{
    public function checksum(string $iban): bool;
}