<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryAX extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Åland Islands',
            countryCode     : 'AX',
            sepa            : true,
            length          : 18,
            regex           : '/^FI(\d{2})(\d{3})(\d{11})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: ''),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}