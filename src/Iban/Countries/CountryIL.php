<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryIL extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Israel',
            countryCode     : 'IL',
            sepa            : false,
            length          : 23,
            regex           : '/^IL(\d{2})(\d{3})(\d{3})(\d{13})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: new SubString(offset: 3, length: 3, pattern: '(\d{3})'),
            accountNumber   : null
        );
    }

}