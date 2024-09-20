<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryNL extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Netherlands (The)',
            countryCode     : 'NL',
            sepa            : true,
            length          : 18,
            regex           : '/^NL(\d{2})([A-Z]{4})(\d{10})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}