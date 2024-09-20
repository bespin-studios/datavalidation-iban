<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountrySD extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Sudan',
            countryCode     : 'SD',
            sepa            : false,
            length          : 18,
            regex           : '/^SD(\d{2})(\d{2})(\d{12})$/',
            bankIdentifier  : new SubString(offset: 0, length: 2, pattern: '(\d{2})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}