<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryIT extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Italy',
            countryCode     : 'IT',
            sepa            : true,
            length          : 27,
            regex           : '/^IT(\d{2})([A-Z]{1})(\d{5})(\d{5})([A-Za-z0-9]{12})$/',
            bankIdentifier  : new SubString(offset: 1, length: 5, pattern: '(\d{5})'),
            branchIdentifier: new SubString(offset: 6, length: 5, pattern: '(\d{5})'),
            accountNumber   : null
        );
    }

}