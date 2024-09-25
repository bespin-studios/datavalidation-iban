<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryNI extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Nicaragua',
            countryCode     : 'NI',
            sepa            : false,
            length          : 28,
            regex           : '/^NI(\d{2})([A-Z]{4})(\d{20})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}