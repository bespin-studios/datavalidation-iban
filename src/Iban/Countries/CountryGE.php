<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryGE extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Georgia',
            countryCode     : 'GE',
            sepa            : false,
            length          : 22,
            regex           : '/^GE(\d{2})([A-Z]{2})(\d{16})$/',
            bankIdentifier  : new SubString(offset: 0, length: 2, pattern: '([A-Z]{2})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}