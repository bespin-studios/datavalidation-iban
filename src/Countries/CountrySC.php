<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountrySC extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Seychelles',
            countryCode     : 'SC',
            sepa            : false,
            length          : 31,
            regex           : '/^SC(\d{2})([A-Z]{4})(\d{2})(\d{2})(\d{16})([A-Z]{3})$/',
            bankIdentifier  : new SubString(offset: 0, length: 6, pattern: '([A-Z]{4})(\d{2})'),
            branchIdentifier: new SubString(offset: 6, length: 2, pattern: '(\d{2})'),
            accountNumber   : null
        );
    }

}