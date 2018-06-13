<?php

namespace App\Listeners;

use App\Helpers\Logs\Logger;
use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // Log the activity
        Logger::build(self::LOG, __('Logs/descriptions.login.success'), $event->user, null, [
            'ip' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        ]);
    }
}
