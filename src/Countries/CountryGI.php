<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryGI extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Gibraltar',
            countryCode     : 'GI',
            sepa            : true,
            length          : 23,
            regex           : '/^GI(\d{2})([A-Z]{4})([A-Za-z0-9]{15})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Z]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}