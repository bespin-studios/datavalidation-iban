<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountrySO extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Somalia',
            countryCode     : 'SO',
            sepa            : false,
            length          : 23,
            regex           : '/^SO(\d{2})(\d{4})(\d{3})(\d{12})$/',
            bankIdentifier  : null,
            branchIdentifier: new SubString(offset: 4, length: 3, pattern: '(\d{3})'),
            accountNumber   : null
        );
    }

}