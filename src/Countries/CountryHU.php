<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryHU extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Hungary',
            countryCode     : 'HU',
            sepa            : true,
            length          : 28,
            regex           : '/^HU(\d{2})(\d{3})(\d{4})(\d{1})(\d{15})(\d{1})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: new SubString(offset: 3, length: 4, pattern: '(\d{4})'),
            accountNumber   : null
        );
    }

}