<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IdentityConfirmed extends Notification
{
    use Queueable;

    public function __construct()
    {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'icon' => asset('images/identity-confirmed.svg'),
            'url' => route('profile'),
            'message' => 'Your identity has been confirmed. You can start participating in bids.'
        ];
    }

    public function databaseType(object $notifiable): string
    {
        return 'identity-confirmed';
    }
}
