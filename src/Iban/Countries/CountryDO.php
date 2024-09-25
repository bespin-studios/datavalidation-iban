<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryDO extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Dominican Republic',
            countryCode     : 'DO',
            sepa            : false,
            length          : 28,
            regex           : '/^DO(\d{2})([A-Za-z0-9]{4})(\d{20})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '([A-Za-z0-9]{4})'),
            branchIdentifier: null,
            accountNumber   : null
        );
    }

}