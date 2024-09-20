<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryGR extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Greece',
            countryCode     : 'GR',
            sepa            : true,
            length          : 27,
            regex           : '/^GR(\d{2})(\d{3})(\d{4})([A-Za-z0-9]{16})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: new SubString(offset: 3, length: 4, pattern: '(\d{4})'),
            accountNumber   : null
        );
    }

}