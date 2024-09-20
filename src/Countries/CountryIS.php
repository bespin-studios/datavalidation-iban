<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryIS extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Iceland',
            countryCode     : 'IS',
            sepa            : false,
            length          : 26,
            regex           : '/^IS(\d{2})(\d{4})(\d{2})(\d{6})(\d{10})$/',
            bankIdentifier  : new SubString(offset: 0, length: 2, pattern: '(\d{2})'),
            branchIdentifier: new SubString(offset: 2, length: 2, pattern: '(\d{2})'),
            accountNumber   : null
        );
    }

}