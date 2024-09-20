<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryST extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Sao Tome and Principe',
            countryCode     : 'ST',
            sepa            : false,
            length          : 25,
            regex           : '/^ST(\d{2})(\d{4})(\d{4})(\d{11})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '(\d{4})'),
            branchIdentifier: new SubString(offset: 4, length: 4, pattern: '(\d{4})'),
            accountNumber   : null
        );
    }

}