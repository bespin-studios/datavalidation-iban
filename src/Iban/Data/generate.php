<?php

use Bespin\DataValidation\Iban\Data\SwiftParser;

include '../../../vendor/autoload.php';

// https://www.swift.com/standards/data-standards/iban-international-bank-account-number
// get the iban registry file from swift and copy it in this directory.
$swiftRegistryFileName = 'iban_registry_v98.txt';
try {
    SwiftParser::parse(file_get_contents($swiftRegistryFileName));
} catch (Throwable $e) {
    echo "Exception Message: ".$e->getMessage().PHP_EOL;
    echo "Exception Code: ".$e->getCode().PHP_EOL;
    echo "Exception File: ".$e->getFile().PHP_EOL;
    echo "Exception Line: ".$e->getLine().PHP_EOL;
    echo "Stack Trace: ".PHP_EOL.$e->getTraceAsString();
}
