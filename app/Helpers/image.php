<?php

if (! function_exists('gravatar')) {
    /**
     * Generate a Gravatar URL for the given email address.
     *
     * @param $email
     * @param string $connection
     * @return string
     */
    function gravatar($email, $connection = 'default')
    {
        $config = array_filter(config("gravatar.$connection", []));
        $url = \Illuminate\Support\Arr::pull($config, 'url', 'https://secure.gravatar.com/avatar');
        $query = http_build_query($config);

        return $url.'/'.md5(strtolower(trim($email))).($query ? "?$query" : '').'?s=200';
    }
}