<?php

namespace Bespin\DataValidation\Iban\Data;

class RegistryCorrections
{
    /**
     * @return array<string, array<string>>
     */
    public static function getBbanCorrections(): array
    {
        return [
            'ST' => [
                '4!n4!n11!n2!n',
                '21',
                '1-4',
                '4!n',
                '5-8',
                '4!n',
                '0001',
                '0001',
                '000100010051845310146',
            ],
            'XK' => [
                '4!n10!n2!n',
                '16',
                '1-2',
                '2!n',
                '3-4',
                '2!n',
                '12',
                '12',
                '1212012345678906',
            ],
        ];
    }

    /**
     * @return array<string, array<string, string>>
     */
    public static function getTerritories(): array
    {
        return [
            'AX'               => ['Country' => 'Åland Islands'],
            'GF'               => ['Country' => 'French Guiana'],
            'GP'               => ['Country' => 'Guadelope'],
            'MQ'               => ['Country' => 'Martinique'],
            'RE'               => ['Country' => 'Réunion'],
            'PF'               => ['Country' => 'French Polynesia'],
            'TF'               => ['Country' => 'French Southern Territories'],
            'YT'               => ['Country' => 'Mayotte'],
            'NC'               => ['Country' => 'New Caledonia'],
            'BL'               => ['Country' => 'Saint Barthélemy'],
            'MF (French part)' => [
                'Country' => 'French Saint Martin',
                'Prefix'  => 'MF'
            ],
            'PM'               => ['Country' => 'Saint-Pierre and Miquelon'],
            'WF'               => ['Country' => 'Wallis and Futuna'],
            'IM'               => ['Country' => 'Isle of Man'],
            'JE'               => ['Country' => 'Jersey'],
            'GG'               => ['Country' => 'Guernsey']
        ];
    }
}