<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;

class LogRegisteredUser
{
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
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        activity('user')
            ->causedBy($event->user)
            ->withProperties([
                'ip'         => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            ])
            ->log('register');
    }
}
