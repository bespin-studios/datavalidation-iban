<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryRU extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Russia',
            countryCode     : 'RU',
            sepa            : false,
            length          : 33,
            regex           : '/^RU(\d{2})(\d{9})(\d{5})([A-Za-z0-9]{15})$/',
            bankIdentifier  : new SubString(offset: 0, length: 9, pattern: '(\d{9})'),
            branchIdentifier: new SubString(offset: 9, length: 5, pattern: '(\d{5})'),
            accountNumber   : null
        );
    }

}