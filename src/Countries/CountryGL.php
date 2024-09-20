<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryGL extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Greenland',
            countryCode     : 'GL',
            sepa            : false,
            length          : 18,
            regex           : '/^GL(\d{2})(\d{4})(\d{9})(\d{1})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '(\d{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}