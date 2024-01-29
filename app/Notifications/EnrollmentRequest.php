<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EnrollmentRequest extends Notification
{
    use Queueable;

    private $courseTitle;
    private $courseType;
    private $subscription_id;

    public function __construct($courseTitle, $subscription_id, $courseType)
    {
        $this->courseTitle = $courseTitle;
        $this->courseType = $courseType;
        $this->subscription_id = $subscription_id;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'courseTitle' => $this->courseTitle,
            'courseType' => $this->courseType,
            'subscription_id' => $this->subscription_id,
        ];
    }
}
