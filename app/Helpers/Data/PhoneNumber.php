<?php

namespace App\Helpers\Data;

class PhoneNumber
{
    /**
     * Format a given phone number.
     *
     * @param string $number
     * @return string
     */
    public static function prettyFormatPhoneNumber(string $number): string
    {
        $number = self::withCountryCode($number);

        if (preg_match('/^(\d{1})(\d{3})(\d{3})(\d{4})$/', $number, $matches)) {
            $result = '+'.$matches[1].' ('.$matches[2].') '.$matches[3].'-'.$matches[4];

            return $result;
        }
    }

    /**
     * Trim and clean a phone number.
     *
     * @param string $number
     * @return string
     */
    public static function clean(string $number): string
    {
        $number = self::stripNonDigits($number);
        $number = self::withoutCountryCode($number);

        return $number;
    }

    /**
     * Strip all non-digits from a phone number.
     *
     * @param string $number
     * @return string
     */
    private static function stripNonDigits(string $number): string
    {
        return preg_replace('/\D+/', '', $number);
    }

    /**
     * Add the country code to a given phone number.
     *
     * @param string $number
     * @return string
     */
    private static function withCountryCode(string $number): string
    {
        if (strlen($number) == 10) {
            $number = '1'.$number;
        }

        return $number;
    }

    /**
     * Remove the country code for a given phone number.
     *
     * @param string $number
     * @return string
     */
    private static function withoutCountryCode(string $number): string
    {
        if (strlen($number) == 11) {
            $number = substr($number, 1);
        }

        return $number;
    }
}
