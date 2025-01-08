<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlacedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $orderDetails;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $orderDetails)
    {
        $this->user = $user;
        $this->orderDetails = $orderDetails;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.order_placed')
                    ->with([
                        'user' => $this->user,
                        'orderDetails' => $this->orderDetails,
                    ])
                    ->subject('Order Confirmation');
    }
}
