<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryTN extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Tunisia',
            countryCode     : 'TN',
            sepa            : false,
            length          : 24,
            regex           : '/^TN(\d{2})(\d{2})(\d{3})(\d{13})(\d{2})$/',
            bankIdentifier  : null,
            branchIdentifier: new SubString(offset: 2, length: 3, pattern: '(\d{3})'),
            accountNumber   : null
        );
    }

}