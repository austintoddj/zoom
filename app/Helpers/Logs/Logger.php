<?php

namespace App\Helpers\Logs;

class Logger
{
    /**
     * @param $name
     * @param $description
     * @param null $subject
     * @param null $causer
     * @param array $properties
     */
    public static function build($name, $description, $subject = null, $causer = null, $properties = [])
    {
        switch (true) {
            case is_null($subject) && is_null($causer):
                activity($name)
                    ->withProperties($properties)
                    ->log($description);
                break;

            case is_null($subject) && ! is_null($causer):
                activity($name)
                    ->causedBy($causer)
                    ->withProperties($properties)
                    ->log($description);
                break;

            case ! is_null($subject) && is_null($causer):
                activity($name)
                    ->performedOn($subject)
                    ->withProperties($properties)
                    ->log($description);
                break;

            default:
                activity($name)
                    ->performedOn($subject)
                    ->causedBy($causer)
                    ->withProperties($properties)
                    ->log($description);
                break;
        }
    }
}
