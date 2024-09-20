<?php

namespace Bespin\IBAN\Countries;

class CountryUA extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Ukraine',
            countryCode     : 'UA',
            sepa            : false,
            length          : 29,
            regex           : '/^UA(\d{2})(\d{6})([A-Za-z0-9]{19})$/',
            bankIdentifier  : null,
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}