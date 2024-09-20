<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryIE extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Ireland',
            countryCode     : 'IE',
            sepa            : true,
            length          : 22,
            regex           : '/^IE(\d{2})([A-Z]{4})(\d{6})(\d{8})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: new SubString(offset: 4, length: 6, pattern: '(\d{6})'),
            accountNumber   : null
        );
    }

}