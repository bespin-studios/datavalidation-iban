<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryQA extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Qatar',
            countryCode     : 'QA',
            sepa            : false,
            length          : 29,
            regex           : '/^QA(\d{2})([A-Z]{4})([A-Za-z0-9]{21})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}