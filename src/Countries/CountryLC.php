<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryLC extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Saint Lucia',
            countryCode     : 'LC',
            sepa            : false,
            length          : 32,
            regex           : '/^LC(\d{2})([A-Z]{4})([A-Za-z0-9]{24})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}