<?php

namespace Bespin\IBAN\Countries;

class CountrySV extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'El Salvador',
            countryCode     : 'SV',
            sepa            : false,
            length          : 28,
            regex           : '/^SV(\d{2})([A-Z]{4})(\d{20})$/',
            bankIdentifier  : null,
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}