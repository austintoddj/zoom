<?php

if (! function_exists('strip_uri')) {
    /**
     * Strip the protocol identifier from the given URL.
     *
     * @param $url
     * @return string
     */
    function strip_uri($url)
    {
        return preg_replace('(^https?://)', '', $url);
    }
}
