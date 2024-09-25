<?php

namespace Bespin\DataValidation\Iban\Countries;

use Bespin\DataValidation\Iban\Data\SubString;

class CountryBA extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Bosnia and Herzegovina',
            countryCode     : 'BA',
            sepa            : false,
            length          : 20,
            regex           : '/^BA(\d{2})(\d{3})(\d{3})(\d{8})(\d{2})$/',
            bankIdentifier  : new SubString(offset: 0, length: 3, pattern: '(\d{3})'),
            branchIdentifier: new SubString(offset: 3, length: 3, pattern: '(\d{3})'),
            accountNumber   : null
        );
    }

}