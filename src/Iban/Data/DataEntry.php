<?php

namespace Bespin\DataValidation\Iban\Data;

use DateTime;

class DataEntry
{
    public function __construct(
        private readonly CountryData $country,
        private readonly BbanData    $bban,
        private readonly IbanData    $iban,
        private readonly DateTime    $date)
    {
    }

    public function getCountry(): CountryData
    {
        return $this->country;
    }

    public function getBban(): BbanData
    {
        return $this->bban;
    }

    public function getIban(): IbanData
    {
        return $this->iban;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function generateClassFile(): void
    {
        $className = 'Country'.strtoupper($this->country->getPrefix());
        $contents = [];
        $contents[] = '<?php';
        $contents[] = '';
        $contents[] = 'namespace Bespin\DataValidation\Countries;';
        $contents[] = '';
        $contents[] = 'use Bespin\DataValidation\SubString;';
        $contents[] = '';
        $contents[] = 'class '.$className.' extends CountryParent';
        $contents[] = '{';
        $contents[] = '';
        $contents[] = '    public function __construct()';
        $contents[] = '    {';
        $contents[] = '        parent::__construct(';
        $contents[] = '            country         : \''.$this->country->getCountry().'\',';
        $contents[] = '            countryCode     : \''.$this->country->getPrefix().'\',';
        $contents[] = '            sepa            : '.($this->country->usesSEPA() ? 'true' : 'false').',';
        $contents[] = '            length          : '.$this->iban->getLength().',';
        $contents[] = '            regex           : \''.$this->iban->getRegex().'\',';
        $contents[] = '            bankIdentifier  : '.$this->bban->getBankIdentifier().',';
        $contents[] = '            branchIdentifier: '.$this->bban->getBranchIdentifier().',';
        $contents[] = '            accountNumber   : '.$this->bban->getAccountNumber();
        $contents[] = '        );';
        $contents[] = '    }';
        $contents[] = '';
        $contents[] = '}';
        file_put_contents(dirname(__FILE__).'/../Countries/'.$className.'.php', implode(PHP_EOL, $contents));
    }
}