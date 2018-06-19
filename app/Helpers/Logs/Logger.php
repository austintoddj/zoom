<?php

namespace App\Helpers\Logs;

use Monolog\Formatter\LineFormatter;
use Monolog\Logger as MonologLogger;
use Monolog\Handler\RotatingFileHandler;

class Logger
{
    /**
     * @param string $name
     * @param null $folder
     * @return MonologLogger
     */
    public static function build(string $name = '', $folder = null)
    {
        // Custom logging for debug mode
        $formatter = new LineFormatter(null, null, true, true);
        $formatter->includeStacktraces();

        if ($folder) {
            $path = sprintf('/logs/%s/', $folder);
        } else {
            $path = '/logs/';
        }

        $handler = new RotatingFileHandler(
            storage_path($path . $name . '-' . php_sapi_name() . '.log'),
            0,
            MonologLogger::DEBUG,
            false
        );
        $handler->setFormatter($formatter);

        $logger = new MonologLogger($name, [$handler]);

        return $logger;
    }

    /**
     * @param string $message
     * @param array $params
     * @return string
     */
    public static function smartParse(string $message = '', array $params = []) {
        return vsprintf($message, $params);
    }
}
