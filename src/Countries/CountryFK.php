<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryFK extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Falkland Islands',
            countryCode     : 'FK',
            sepa            : false,
            length          : 18,
            regex           : '/^FK(\d{2})([A-Z]{2})(\d{12})$/',
            bankIdentifier  : new SubString(offset: 0, length: 2, pattern: '([A-Z]{2})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}