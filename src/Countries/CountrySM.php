<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountrySM extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'San Marino',
            countryCode     : 'SM',
            sepa            : true,
            length          : 27,
            regex           : '/^SM(\d{2})([A-Z]{1})(\d{5})(\d{5})([A-Za-z0-9]{12})$/',
            bankIdentifier  : null,
            branchIdentifier: new SubString(offset: 6, length: 5, pattern: '(\d{5})'),
            accountNumber   : null
        );
    }

}