<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryBR extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Brazil',
            countryCode     : 'BR',
            sepa            : false,
            length          : 29,
            regex           : '/^BR(\d{2})(\d{8})(\d{5})(\d{10})([A-Z]{1})([A-Za-z0-9]{1})$/',
            bankIdentifier  : new SubString(offset: 0, length: 8, pattern: '(\d{8})'),
            branchIdentifier: new SubString(offset: 8, length: 5, pattern: '(\d{5})'),
            accountNumber   : null
        );
    }

}