<?php

namespace App\Listeners;

use App\Helpers\Logs\Logger;
use Illuminate\Auth\Events\Failed;

class LogFailedLogin
{
    const LOG = 'user';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        // Log the error message
        Logger::build(self::LOG, __('Logs/descriptions.login.error'), null, null, [
            'email' => $event->credentials['email'],
            'ip' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        ]);
    }
}