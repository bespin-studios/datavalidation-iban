<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryRS extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Serbia',
            countryCode     : 'RS',
            sepa            : false,
            length          : 22,
            regex           : '/^RS(\d{2})(\d{3})(\d{13})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}