<?php

namespace Bespin\IBAN\Countries;

use Bespin\IBAN\Data\SubString;

class CountryES extends CountryParent
{

    public function __construct()
    {
        parent::__construct(
            country         : 'Spain',
            countryCode     : 'ES',
            sepa            : true,
            length          : 24,
            regex           : '/^ES(\d{2})(\d{4})(\d{4})(\d{1})(\d{1})(\d{10})$/',
            bankIdentifier  : new SubString(offset: 0, length: 4, pattern: '(\d{4})'),
            branchIdentifier: new SubString(offset: 4, length: 4, pattern: '(\d{4})'),
            accountNumber   : null
        );
    }

}