<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryPT extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Portugal',
            countryCode     : 'PT',
            sepa            : true,
            length          : 25,
            regex           : '/^PT(\d{2})(\d{4})(\d{4})(\d{11})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '(\d{4})'),
            branchIdentifier: new SubString(offset: 4, length: 4, pattern: '(\d{4})'),
            accountNumber   : null
        );
    }

}