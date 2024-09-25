<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryAT extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Austria',
            countryCode     : 'AT',
            sepa            : true,
            length          : 20,
            regex           : '/^AT(\d{2})(\d{5})(\d{11})$/',
            bankIdentifier  : new SubString(offset: 0, length: 5, pattern: '(\d{5})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}