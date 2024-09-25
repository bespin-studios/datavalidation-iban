<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryGP extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Guadelope',
            countryCode     : 'GP',
            sepa            : true,
            length          : 27,
            regex           : '/^FR(\d{2})(\d{5})(\d{5})([A-Za-z0-9]{11})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 5, pattern: '(\d{5})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}