<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryCZ extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Czechia',
            countryCode     : 'CZ',
            sepa            : true,
            length          : 24,
            regex           : '/^CZ(\d{2})(\d{4})(\d{6})(\d{10})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '(\d{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}