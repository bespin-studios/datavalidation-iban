<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryHR extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Croatia',
            countryCode     : 'HR',
            sepa            : true,
            length          : 21,
            regex           : '/^HR(\d{2})(\d{7})(\d{10})$/',
            bankIdentifier  : new SubString(offset: 0, length: 7, pattern: '(\d{7})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}