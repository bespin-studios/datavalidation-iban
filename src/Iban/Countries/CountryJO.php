<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryJO extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Jordan',
            countryCode     : 'JO',
            sepa            : false,
            length          : 30,
            regex           : '/^JO(\d{2})([A-Z]{4})(\d{4})([A-Za-z0-9]{18})$/',
            bankIdentifier  : new SubString(offset: 4, length: 4, pattern: '(\d{4})'),
            branchIdentifier: new SubString(offset: 4, length: 4, pattern: '(\d{4})'),
            accountNumber   : null
        );
    }

}