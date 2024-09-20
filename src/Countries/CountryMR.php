<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryMR extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Mauritania',
            countryCode     : 'MR',
            sepa            : false,
            length          : 27,
            regex           : '/^MR(\d{2})(\d{5})(\d{5})(\d{11})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 5, pattern: '(\d{5})'),
            branchIdentifier: new SubString(offset: 5, length: 5, pattern: '(\d{5})'),
            accountNumber   : null
        );
    }

}