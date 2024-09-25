<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountrySE extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Sweden',
            countryCode     : 'SE',
            sepa            : true,
            length          : 24,
            regex           : '/^SE(\d{2})(\d{3})(\d{16})(\d{1})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}