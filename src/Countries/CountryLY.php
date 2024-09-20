<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryLY extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Libya',
            countryCode     : 'LY',
            sepa            : false,
            length          : 25,
            regex           : '/^LY(\d{2})(\d{3})(\d{3})(\d{15})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: new SubString(offset: 3, length: 3, pattern: '(\d{3})'),
            accountNumber   : null
        );
    }

}