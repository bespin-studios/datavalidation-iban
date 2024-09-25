<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryKZ extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Kazakhstan',
            countryCode     : 'KZ',
            sepa            : false,
            length          : 20,
            regex           : '/^KZ(\d{2})(\d{3})([A-Za-z0-9]{13})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}