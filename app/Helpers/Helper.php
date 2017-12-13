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

        return $url.'/'.md5(strtolower(trim($email))).($query ? "?$query" : '');
    }

    /**
     * Return the browser name based on the HTTP User Agent.
     *
     * @param  string  #userAgent
     * @return string
     */
    public static function getBrowser($userAgent)
    {
        switch (true) {
            case strpos($userAgent, 'MSIE'):
                return 'Internet Explorer';
                break;
            case strpos($userAgent, 'Trident'):
                return 'Internet Explorer';
                break;
            case strpos($userAgent, 'Firefox'):
                return 'Firefox';
                break;
            case strpos($userAgent, 'Chrome'):
                return 'Google Chrome';
                break;
            case strpos($userAgent, 'Opera Mini'):
                return 'Opera Mini';
                break;
            case strpos($userAgent, 'Opera'):
                return 'Opera';
                break;
            case strpos($userAgent, 'Safari'):
                return 'Safari';
                break;
            default:
                return 'Unknown browser';
                break;
        }
    }

    /**
     * Return the operating system based on the HTTP User Agent.
     *
     * @param  string  #userAgent
     * @return string
     */
    public static function getOperatingSystem($userAgent)
    {
        switch (true) {
            case preg_match('/Linux/', $userAgent):
                return 'Linux';
                break;
            case preg_match('/Win/', $userAgent):
                return 'Windows';
                break;
            case preg_match('/Mac/', $userAgent):
                return 'macOS';
                break;
            default:
                return 'Unknown operating system';
                break;
        }
    }
}
