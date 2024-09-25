<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryAE extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'United Arab Emirates (The)',
            countryCode     : 'AE',
            sepa            : false,
            length          : 23,
            regex           : '/^AE(\d{2})(\d{3})(\d{16})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}