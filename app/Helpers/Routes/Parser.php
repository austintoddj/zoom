<?php

namespace App\Helpers\Routes;

use Exception;

class Parser
{
    /**
     * @param $url
     * @return string
     */
    public static function parseUrl($url)
    {
        return preg_replace('(^https?://)', '', $url);
    }

    /**
     * @param $directory
     * @return string
     */
    public static function parseRouteFiles($directory)
    {
        try {
            $rdi = new \recursiveDirectoryIterator($directory);
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
