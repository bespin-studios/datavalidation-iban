<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryCR extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Costa Rica',
            countryCode     : 'CR',
            sepa            : false,
            length          : 22,
            regex           : '/^CR(\d{2})(\d{4})(\d{14})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '(\d{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}