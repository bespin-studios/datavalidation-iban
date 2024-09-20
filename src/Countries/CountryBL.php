<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryBL extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Saint Barthélemy',
            countryCode     : 'BL',
            sepa            : true,
            length          : 27,
            regex           : '/^FR(\d{2})(\d{5})(\d{5})([A-Za-z0-9]{11})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 5, pattern: '(\d{5})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}