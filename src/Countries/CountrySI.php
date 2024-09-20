<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountrySI extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Slovenia',
            countryCode     : 'SI',
            sepa            : true,
            length          : 19,
            regex           : '/^SI(\d{2})(\d{5})(\d{8})(\d{2})$/',
            bankIdentifier  : new SubString(offset: -1, length: 6, pattern: '(\d{5})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}