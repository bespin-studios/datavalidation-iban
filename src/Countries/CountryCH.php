<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryCH extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Switzerland',
            countryCode     : 'CH',
            sepa            : true,
            length          : 21,
            regex           : '/^CH(\d{2})(\d{5})([A-Za-z0-9]{12})$/',
            bankIdentifier  : new SubString(offset: 0, length: 5, pattern: '(\d{5})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}