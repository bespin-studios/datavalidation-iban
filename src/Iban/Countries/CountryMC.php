<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryMC extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Monaco',
            countryCode     : 'MC',
            sepa            : true,
            length          : 27,
            regex           : '/^MC(\d{2})(\d{5})(\d{5})([A-Za-z0-9]{11})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 5, pattern: '(\d{5})'),
            branchIdentifier: new SubString(offset: 5, length: 5, pattern: '(\d{5})'),
            accountNumber   : null
        );
    }

}