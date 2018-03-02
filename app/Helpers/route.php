<?php

if (! function_exists('route_files')) {
    /**
     * Generate a Gravatar URL for the given email address.
     *
     * @param $dir
     * @return string
     */
    function route_files($dir)
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