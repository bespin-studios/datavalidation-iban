<?php

namespace Bespin\IBAN\Data;

use DateTime;
use DateTimeZone;
use Exception;

class IbanData
{
    private readonly DateTime $effectiveDate;
    private readonly string   $regex;
    private readonly string   $humanFormatPattern;

    /**
     * @throws Exception
     */
    public function __construct(
        private readonly string $format,
        private readonly int    $length,
        string                  $effectiveDate,
        private readonly string $machineExample,
        private readonly string $humanExample,
    )
    {
        $format     = '!d-M-y';
        $dateObject = DateTime::createFromFormat($format, '01-'.$effectiveDate, new DateTimeZone('UTC'));
        if ($dateObject === false) {
            throw new Exception('Invalid date format ('.$format.'): 01-'.$effectiveDate);
        }
        $this->effectiveDate = $dateObject;
        $this->regex         = '/^'.substr($this->format, 0, 2).SwiftFormatConverter::convert(substr($this->format, 2)).'$/';
        if (preg_match($this->regex, $this->machineExample) === false) {
            throw new Exception('Format does not match example');
        }
        $this->humanFormatPattern = self::generateHumanPattern($this->humanExample);
        $humanExampleTest         = preg_replace_callback($this->humanFormatPattern, function ($matches) {
            return implode(' ', array_slice($matches, 1)); // Insert spaces between the matched segments
        }, $this->machineExample);
        if ($humanExampleTest !== $this->humanExample) {
            throw new Exception('Human format does not match example');
        }
    }

    private static function generateHumanPattern(string $formattedString): string
    {
        // Split the formatted string by spaces to get the segment lengths
        $segments = explode(' ', $formattedString);

        // Build a regex pattern based on the segment lengths
        $regex = '/^';
        foreach ($segments as $segment) {
            $length = strlen($segment);
            $regex  .= '(\w{'.$length.'})';
        }
        $regex .= '$/';

        return $regex;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getMachineExample(): string
    {
        return $this->machineExample;
    }

    public function getHumanExample(): string
    {
        return $this->humanExample;
    }

    public function getEffectiveDate(): DateTime
    {
        return $this->effectiveDate;
    }

    public function getRegex(): string
    {
        return $this->regex;
    }

    public function getHumanFormatPattern(): string
    {
        return $this->humanFormatPattern;
    }
}