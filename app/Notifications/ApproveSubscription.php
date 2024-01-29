<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApproveSubscription extends Notification
{
    use Queueable;

    private $courseTitle;
    private $subscription_id;
    private $student_id;

    public function __construct($courseTitle, $subscription_id, $student_id)
    {
        $this->courseTitle = $courseTitle;
        $this->subscription_id = $subscription_id;
        $this->student_id = $student_id;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'courseTitle' => $this->courseTitle,
            'subscription_id' => $this->subscription_id,
            'student_id' => $this->student_id,
        ];
    }
}
