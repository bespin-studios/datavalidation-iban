<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryME extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Montenegro',
            countryCode     : 'ME',
            sepa            : false,
            length          : 22,
            regex           : '/^ME(\d{2})(\d{3})(\d{13})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}