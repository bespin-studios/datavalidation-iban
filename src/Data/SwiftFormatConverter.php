<?php

namespace Bespin\IBAN\Data;

use Exception;

class SwiftFormatConverter
{
    /**
     * @param string $swiftFormat
     * @return string
     * @throws Exception
     */
    public static function convert(string $swiftFormat): string
    {
        // Regex patterns for each character type
        $patterns = [
            'n' => '\d',           // Digits
            'a' => '[A-Z]',        // Uppercase letters
            'c' => '[A-Za-z0-9]',  // Alphanumeric characters
            'e' => '\s',           // Blank space
        ];

        // Replace SWIFT patterns with the corresponding regex
        $result = preg_replace_callback('/(\d+)(!?)([nace])/', function ($matches) use ($patterns) {
            $length = $matches[1]; // Extract the length
            $fixed  = $matches[2];  // Check if length is fixed (indicated by !)
            $type   = $matches[3];   // Extract the type (n, a, c, e)

            $pattern = $patterns[$type]; // Get the corresponding regex pattern

            // If fixed length, return exact length, otherwise use max length
            return '('.($fixed === '!' ? $pattern.'{'.$length.'}' : $pattern.'{1,'.$length.'}').')';
        }, $swiftFormat);
        if ($result === null) {
            throw new Exception('Failed to convert swift format to regex pattern: '.$swiftFormat);
        }
        return $result;
    }
}