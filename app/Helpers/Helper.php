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
}