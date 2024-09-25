<?php

namespace Bespin\DataValidation\Iban\Countries;

class CountryTL extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Timor-Leste',
            countryCode     : 'TL',
            sepa            : false,
            length          : 23,
            regex           : '/^TL(\d{2})(\d{3})(\d{14})(\d{2})$/',
            bankIdentifier  : null,
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}