<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryLI extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Liechtenstein',
            countryCode     : 'LI',
            sepa            : true,
            length          : 21,
            regex           : '/^LI(\d{2})(\d{5})([A-Za-z0-9]{12})$/',
            bankIdentifier  : new SubString(offset: 0, length: 5, pattern: '(\d{5})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}