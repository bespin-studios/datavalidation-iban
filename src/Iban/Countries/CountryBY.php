<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryBY extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Republic of Belarus',
            countryCode     : 'BY',
            sepa            : false,
            length          : 28,
            regex           : '/^BY(\d{2})([A-Za-z0-9]{4})(\d{4})([A-Za-z0-9]{16})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Za-z0-9]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}