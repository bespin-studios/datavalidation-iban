<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryRO extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Romania',
            countryCode     : 'RO',
            sepa            : true,
            length          : 24,
            regex           : '/^RO(\d{2})([A-Z]{4})([A-Za-z0-9]{16})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}