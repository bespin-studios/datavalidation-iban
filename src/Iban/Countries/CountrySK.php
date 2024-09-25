<?php

namespace Bespin\DataValidation\Iban\Countries;

class CountrySK extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Slovakia',
            countryCode     : 'SK',
            sepa            : true,
            length          : 24,
            regex           : '/^SK(\d{2})(\d{4})(\d{6})(\d{10})$/',
            bankIdentifier  : null,
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}