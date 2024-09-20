<?php

namespace Bespin\IBAN\Checksum;

interface ChecksumInterface
{
    public function checksum(string $iban): bool;
}