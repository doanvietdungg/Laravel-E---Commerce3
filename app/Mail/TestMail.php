<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PharIo\Manifest\Author;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $detailPrd;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$orderItem)
    {
        
        $this->details=$order;
        $this->detailPrd=$orderItem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Check lại hoá đơn')->view('email.test');
    }
}
