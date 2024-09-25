<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryMT extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Malta',
            countryCode     : 'MT',
            sepa            : true,
            length          : 31,
            regex           : '/^MT(\d{2})([A-Z]{4})(\d{5})([A-Za-z0-9]{18})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: new SubString(offset: 4, length: 5, pattern: '(\d{5})'),
            accountNumber   : null
        );
    }

}