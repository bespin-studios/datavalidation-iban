<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryPL extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Poland',
            countryCode     : 'PL',
            sepa            : true,
            length          : 28,
            regex           : '/^PL(\d{2})(\d{8})(\d{16})$/',
            bankIdentifier  : null,
            branchIdentifier: new SubString(offset: 0, length: 8, pattern: '(\d{8})'),
            accountNumber   : null
        );
    }

}