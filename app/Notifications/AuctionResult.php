<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AuctionResult extends Notification
{
    use Queueable;

    public function __construct(
        public Product $product,
        public bool $hasWon
    ){}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $message = $this->hasWon ?
            'Congratulations! You have won the bidding for ' . $this->product->product_name . ' , we will get in touch to you later.' :
            'Unfortunately, you have not won the bidding for ' . $this->product->product_name;

        return [
            'icon' => asset('images/flag.svg'),
            'url' => route('default.products.show', ['product' => $this->product]),
            'message' => $message,
        ];
    }

    public function databaseType(object $notifiable): string
    {
        return 'action-result';
    }
}
