<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryBH extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Bahrain',
            countryCode     : 'BH',
            sepa            : false,
            length          : 22,
            regex           : '/^BH(\d{2})([A-Z]{4})([A-Za-z0-9]{14})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}