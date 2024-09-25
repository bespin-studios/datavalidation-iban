<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryAZ extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Azerbaijan',
            countryCode     : 'AZ',
            sepa            : false,
            length          : 28,
            regex           : '/^AZ(\d{2})([A-Z]{4})([A-Za-z0-9]{20})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}