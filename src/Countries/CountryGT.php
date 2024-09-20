<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryGT extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Guatemala',
            countryCode     : 'GT',
            sepa            : false,
            length          : 28,
            regex           : '/^GT(\d{2})([A-Za-z0-9]{4})([A-Za-z0-9]{20})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Za-z0-9]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}