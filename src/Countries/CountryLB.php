<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryLB extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Lebanon',
            countryCode     : 'LB',
            sepa            : false,
            length          : 28,
            regex           : '/^LB(\d{2})(\d{4})([A-Za-z0-9]{20})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}