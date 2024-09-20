<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryLU extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Luxembourg',
            countryCode     : 'LU',
            sepa            : true,
            length          : 20,
            regex           : '/^LU(\d{2})(\d{3})([A-Za-z0-9]{13})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}