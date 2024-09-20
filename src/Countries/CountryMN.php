<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryMN extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Mongolia',
            countryCode     : 'MN',
            sepa            : false,
            length          : 20,
            regex           : '/^MN(\d{2})(\d{4})(\d{12})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '(\d{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}