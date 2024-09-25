<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryMU extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Mauritius',
            countryCode     : 'MU',
            sepa            : false,
            length          : 30,
            regex           : '/^MU(\d{2})([A-Z]{4})(\d{2})(\d{2})(\d{12})(\d{3})([A-Z]{3})$/',
            bankIdentifier  : new SubString(offset: 0, length: 6, pattern: '([A-Za-z0-9]{6})'),
            branchIdentifier: new SubString(offset: 6, length: 2, pattern: '(\d{2})'),
            accountNumber   : null
        );
    }

}