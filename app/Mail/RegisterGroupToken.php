<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterGroupToken extends Mailable
{
    use Queueable, SerializesModels;

    public $groupToken;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $groupToken)
    {
        $this->groupToken = $groupToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.registerGroup');
    }
}
