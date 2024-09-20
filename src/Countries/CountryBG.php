<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryBG extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Bulgaria',
            countryCode     : 'BG',
            sepa            : true,
            length          : 22,
            regex           : '/^BG(\d{2})([A-Z]{4})(\d{4})(\d{2})([A-Za-z0-9]{8})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: new SubString(offset: 4, length: 4, pattern: '(\d{4})'),
            accountNumber   : null
        );
    }

}