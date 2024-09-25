<?php

namespace Bespin\DataValidation\Iban\Data;

class CountryData
{
    /** @var string[] */
    private array $territories = [];
    /** @var string[] */
    private array         $sepaTerritories = [];
    private readonly bool $usesSEPA;

    public function __construct(
        private readonly string $country,
        private readonly string $prefix,
        string                  $includesTerritories,
        string                  $SEPA,
        string                  $SEPAIncludes,
        private readonly string $accountNumberExample)
    {
        if ($SEPA === 'Yes') {
            $this->usesSEPA = true;
        } else {
            $this->usesSEPA = false;
        }
        if (!empty($includesTerritories) && $includesTerritories !== 'N/A') {
            $this->territories = array_map(function ($item) {
                return trim($item);
            }, explode(',', trim($includesTerritories, "\"")));
        }
        if (!empty($SEPAIncludes) && !str_contains($SEPAIncludes, 'N/A')) {
            $this->sepaTerritories = array_map(function ($item) {
                return trim($item);
            }, explode(',', $SEPAIncludes));
        }
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @return array<string>
     */
    public function getIncludedTerritories(): array
    {
        return $this->territories;
    }

    public function territoryUsesSEPA(string $territory): bool
    {
        return in_array($territory, $this->sepaTerritories);
    }

    public function usesSEPA(): bool
    {
        return $this->usesSEPA;
    }

    public function getAccountNumberExample(): string
    {
        return $this->accountNumberExample;
    }
}