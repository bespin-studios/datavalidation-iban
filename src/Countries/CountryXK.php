<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryXK extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Kosovo',
            countryCode     : 'XK',
            sepa            : false,
            length          : 20,
            regex           : '/^XK(\d{2})(\d{4})(\d{10})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 2, pattern: '(\d{2})'),
            branchIdentifier: new SubString(offset: 2, length: 2, pattern: '(\d{2})'),
            accountNumber   : null
        );
    }

}