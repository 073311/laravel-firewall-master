<?php

namespace ievtds\Firewall\Listeners;

use ievtds\Firewall\Events\AttackDetected as Event;
use ievtds\Firewall\Notifications\AttackDetected;
use ievtds\Firewall\Notifications\Notifiable;
use Throwable;

class NotifyUsers
{
    /**
     * Handle the event.
     *
     * @param Event $event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        try {
            (new Notifiable)->notify(new AttackDetected($event->log));
        } catch (Throwable $e) {
            report($e);
        }
    }
}
