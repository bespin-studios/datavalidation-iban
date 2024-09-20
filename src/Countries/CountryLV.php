<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryLV extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Latvia',
            countryCode     : 'LV',
            sepa            : true,
            length          : 21,
            regex           : '/^LV(\d{2})([A-Z]{4})([A-Za-z0-9]{13})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}