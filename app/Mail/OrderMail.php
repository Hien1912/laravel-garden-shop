<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $carts;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($carts, $data)
    {
        $this->carts = $carts;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Đặt hàng thành công")
            ->view('emails.order')
            ->with(["carts", $this->carts, 'data' => $this->data]);
    }
}
