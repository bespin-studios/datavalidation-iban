<?php

namespace Bespin\IBAN\Checksum;

class Mod97_10 implements ChecksumInterface
{
    public function checksum(string $iban): bool
    {
        // Move the first four characters to the end
        $rearrangedIban = substr($iban, 4).substr($iban, 0, 4);

        // Convert letters to numbers (A = 10, B = 11, ..., Z = 35)
        $numericIban = '';
        foreach (str_split($rearrangedIban) as $char) {
            if (ctype_alpha($char)) {
                // Convert letter to corresponding number
                $numericIban .= ord($char) - 55;
            } else {
                $numericIban .= $char;
            }
        }

        // Check if GMP extension is available
        if (extension_loaded('gmp')) {
            // Use GMP for large number handling
            return gmp_intval(gmp_mod(gmp_init($numericIban, 10), 97)) === 1;
        } else {
            // Fallback to standard int-based mod operation for smaller numbers
            $numericIban = ltrim($numericIban, '0'); // Remove leading zeros, if any
            $mod         = 0;

            // Process in chunks to avoid PHP's integer overflow issues
            while (strlen($numericIban) > 0) {
                $length      = 9 - ($mod === 0 ? 0 : ($mod < 10 ? 1 : 2));
                $chunk       = substr($numericIban, 0, $length);
                $mod         = intval($mod.$chunk) % 97;
                $numericIban = substr($numericIban, $length);
            }

            return $mod === 1;
        }
    }
}