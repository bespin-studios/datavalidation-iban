<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryNO extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Norway',
            countryCode     : 'NO',
            sepa            : true,
            length          : 15,
            regex           : '/^NO(\d{2})(\d{4})(\d{6})(\d{1})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '(\d{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}