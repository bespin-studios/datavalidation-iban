<?php

namespace Bespin\IBAN\Countries;

class CountryVG extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Virgin Islands',
            countryCode     : 'VG',
            sepa            : false,
            length          : 24,
            regex           : '/^VG(\d{2})([A-Z]{4})(\d{16})$/',
            bankIdentifier  : null,
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}