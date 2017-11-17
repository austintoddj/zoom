<?php

namespace App\Helpers;

use App\Meta\Constants;

class Helper extends Constants
{
    /**
     * Strip the protocol identifier from the given URL.
     *
     * @param string $url
     * @return string
     */
    public static function stripProtocolIdentifier($url)
    {
        return preg_replace('(^https?://)', '', $url);
    }
}