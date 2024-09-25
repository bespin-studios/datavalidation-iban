<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryOM extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Oman',
            countryCode     : 'OM',
            sepa            : false,
            length          : 23,
            regex           : '/^OM(\d{2})(\d{3})([A-Za-z0-9]{16})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}