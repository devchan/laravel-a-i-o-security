<?php

namespace Devchan\LaravelAIOSecurity\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Session\Session;

class StoreUserSessionId
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param  IlluminateAuthEventsLogin  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        if (!$event->user->session_id) {
            $event->user->session_id = $this->session->getId();
            $event->user->save();
        }
    }
}
