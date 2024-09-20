<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryIQ extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Iraq',
            countryCode     : 'IQ',
            sepa            : false,
            length          : 23,
            regex           : '/^IQ(\d{2})([A-Z]{4})(\d{3})(\d{12})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '4'),
            branchIdentifier: new SubString(offset: 4, length: 3, pattern: '3'),
            accountNumber   : null
        );
    }

}