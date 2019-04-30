<?php

namespace Zoom;

class Zoom
{
    /**
     * Indicates if Zoom should utilize the dark mode.
     *
     * @var bool
     */
    public static $useDarkMode = false;

    /**
     * Specifies that Zoom should apply the dark mode.
     *
     * @return static
     */
    public static function night()
    {
        static::$useDarkMode = true;

        return new static;
    }
}
