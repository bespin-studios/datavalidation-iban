<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryDE extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Germany',
            countryCode     : 'DE',
            sepa            : true,
            length          : 22,
            regex           : '/^DE(\d{2})(\d{8})(\d{10})$/',
            bankIdentifier  : new SubString(offset: 0, length: 8, pattern: '(\d{8})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}