<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SpecificInstructor extends Notification
{
    use Queueable;

    private $specificNotification;

    public function __construct($specificNotification)
    {
        $this->specificNotification = $specificNotification;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'specificNotification' => $this->specificNotification,
        ];
    }
}
