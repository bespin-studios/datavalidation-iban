<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryAD extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Andorra',
            countryCode     : 'AD',
            sepa            : true,
            length          : 24,
            regex           : '/^AD(\d{2})(\d{4})(\d{4})([A-Za-z0-9]{12})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '(\d{4})'),
            branchIdentifier: new SubString(offset: 4, length: 4, pattern: '(\d{4})'),
            accountNumber   : null
        );
    }

}