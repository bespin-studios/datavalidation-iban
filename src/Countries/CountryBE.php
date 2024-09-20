<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryBE extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Belgium',
            countryCode     : 'BE',
            sepa            : true,
            length          : 16,
            regex           : '/^BE(\d{2})(\d{3})(\d{7})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}