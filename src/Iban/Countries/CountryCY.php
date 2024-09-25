<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryCY extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Cyprus',
            countryCode     : 'CY',
            sepa            : true,
            length          : 28,
            regex           : '/^CY(\d{2})(\d{3})(\d{5})([A-Za-z0-9]{16})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: new SubString(offset: 3, length: 5, pattern: '(\d{5})'),
            accountNumber   : null
        );
    }

}