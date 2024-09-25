<?php

namespace Bespin\DataValidation\Iban\Countries;

class CountryTR extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Turkey',
            countryCode     : 'TR',
            sepa            : false,
            length          : 26,
            regex           : '/^TR(\d{2})(\d{5})(\d{1})([A-Za-z0-9]{16})$/',
            bankIdentifier  : null,
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}