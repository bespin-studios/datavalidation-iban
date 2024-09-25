<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryEE extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Estonia',
            countryCode     : 'EE',
            sepa            : true,
            length          : 20,
            regex           : '/^EE(\d{2})(\d{2})(\d{2})(\d{11})(\d{1})$/',
            bankIdentifier  : new SubString(offset: 0, length: 2, pattern: '(\d{2})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}