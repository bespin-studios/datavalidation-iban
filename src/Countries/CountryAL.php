<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryAL extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Albania',
            countryCode     : 'AL',
            sepa            : false,
            length          : 28,
            regex           : '/^AL(\d{2})(\d{8})([A-Za-z0-9]{16})$/',
            bankIdentifier  : new SubString(offset: 0, length: 8, pattern: '(\d{8})'),
            branchIdentifier: new SubString(offset: 3, length: 5, pattern: '(\d{5})'),
            accountNumber   : null
        );
    }

}