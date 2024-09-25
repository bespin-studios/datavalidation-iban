<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryFO extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Faroe Islands',
            countryCode     : 'FO',
            sepa            : false,
            length          : 18,
            regex           : '/^FO(\d{2})(\d{4})(\d{9})(\d{1})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '(\d{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}