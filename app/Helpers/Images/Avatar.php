<?php

namespace App\Helpers\Images;

use Illuminate\Support\Arr;

class Avatar
{
    const GRAVATAR_URL = 'https://secure.gravatar.com/avatar';
    const GRAVATAR_SIZE = '200';

    /**
     * @param $email
     * @param string $connection
     * @return string
     */
    public static function generateGravatar($email, $connection = 'default')
    {
        $config = array_filter(config("gravatar.$connection", []));
        $url = Arr::pull($config, 'url', self::GRAVATAR_URL);
        $query = http_build_query($config);

        return $url.'/'.md5(strtolower(trim($email))).($query ? "?$query" : '').'?s='.self::GRAVATAR_SIZE;
    }
}
