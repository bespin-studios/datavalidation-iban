<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryYE extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Yemen',
            countryCode     : 'YE',
            sepa            : false,
            length          : 30,
            regex           : '/^YE(\d{2})([A-Z]{4})(\d{4})([A-Za-z0-9]{18})$/',
            bankIdentifier  : null,
            branchIdentifier: new SubString(offset: 4, length: 4, pattern: '(\d{4})'),
            accountNumber   : null
        );
    }

}