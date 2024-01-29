<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateMeeting extends Notification
{
    use Queueable;

    private $sessionName;
    private $sessionId;
    private $sessionStartDate;
    private $courseTitle;

    public function __construct($courseTitle, $sessionName, $sessionStartDate, $sessionId)
    {
        $this->courseTitle = $courseTitle;
        $this->sessionName = $sessionName;
        $this->sessionId = $sessionId;
        $this->sessionStartDate = $sessionStartDate;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'courseTitle' => $this->courseTitle,
            'sessionName' => $this->sessionName,
            'sessionId' => $this->sessionId,
            'sessionStartDate' => $this->sessionStartDate,
        ];
    }
}
