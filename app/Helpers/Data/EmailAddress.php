<?php

namespace App\Helpers\Data;

class EmailAddress
{
    /**
     * Check if an email address is valid.
     *
     * @param string $email
     * @return bool
     */
    public static function isValid(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
