<?php

namespace App\Listeners;

use App\Helpers\Logs\Logger;
use Illuminate\Auth\Events\Registered;

class LogRegisteredUser
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // Log the activity
        Logger::build(self::LOG, __('Logs/descriptions.register.success'), $event->user, $event->user, [
            'ip' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        ]);
    }
}