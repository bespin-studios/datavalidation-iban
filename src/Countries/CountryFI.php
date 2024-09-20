<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryFI extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Finland',
            countryCode     : 'FI',
            sepa            : true,
            length          : 18,
            regex           : '/^FI(\d{2})(\d{3})(\d{11})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: ''),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}