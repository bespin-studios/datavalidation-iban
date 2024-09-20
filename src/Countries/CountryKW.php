<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryKW extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Kuwait',
            countryCode     : 'KW',
            sepa            : false,
            length          : 30,
            regex           : '/^KW(\d{2})([A-Z]{4})([A-Za-z0-9]{22})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}