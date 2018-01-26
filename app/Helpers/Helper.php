<?php

namespace App\Helpers;

use App\Meta\Constants;
use Illuminate\Support\Arr;

class Helper extends Constants
{
    /**
     * Strip the protocol identifier from the given URL.
     *
     * @param  string $url
     * @return string
     */
    public static function stripProtocolIdentifier($url)
    {
        return preg_replace('(^https?://)', '', $url);
    }

    /**
     * Return the route files within a directory.
     *
     * @param string $dir
     */
    public static function includeRouteFiles($dir)
    {
        try {
            $rdi = new \recursiveDirectoryIterator($dir);
            $it = new \recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Generate a Gravatar URL for the given email address.
     *
     * @param  string  $email
     * @param  string  $connection
     * @return string
     */
    public static function gravatar($email, $connection = 'default')
    {
        $config = array_filter(config("gravatar.$connection", []));
        $url = Arr::pull($config, 'url', 'https://secure.gravatar.com/avatar');
        $query = http_build_query($config);

        return $url.'/'.md5(strtolower(trim($email))).($query ? "?$query" : '').'?s=200';
    }
}