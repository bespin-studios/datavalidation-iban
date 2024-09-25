<?php

namespace Bespin\DataValidation\Iban\Countries;

class CountryVA extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Vatican City State',
            countryCode     : 'VA',
            sepa            : true,
            length          : 22,
            regex           : '/^VA(\d{2})(\d{3})(\d{15})$/',
            bankIdentifier  : null,
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}