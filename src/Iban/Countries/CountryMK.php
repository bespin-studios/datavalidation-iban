<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryMK extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Macedonia',
            countryCode     : 'MK',
            sepa            : false,
            length          : 19,
            regex           : '/^MK(\d{2})(\d{3})([A-Za-z0-9]{10})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}