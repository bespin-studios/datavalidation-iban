<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryEG extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Egypt',
            countryCode     : 'EG',
            sepa            : false,
            length          : 29,
            regex           : '/^EG(\d{2})(\d{4})(\d{4})(\d{17})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '4!'),
            branchIdentifier: new SubString(offset: 4, length: 4, pattern: '4!'),
            accountNumber   : null
        );
    }

}