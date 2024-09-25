<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryMD extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Moldova',
            countryCode     : 'MD',
            sepa            : false,
            length          : 24,
            regex           : '/^MD(\d{2})([A-Za-z0-9]{2})([A-Za-z0-9]{18})$/',
            bankIdentifier  : new SubString(offset: 0, length: 2, pattern: '([A-Za-z0-9]{2})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}