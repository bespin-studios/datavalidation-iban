<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountrySA extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Saudi Arabia',
            countryCode     : 'SA',
            sepa            : false,
            length          : 24,
            regex           : '/^SA(\d{2})(\d{2})([A-Za-z0-9]{18})$/',
            bankIdentifier  : new SubString(offset: 0, length: 2, pattern: '(\d{2})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}