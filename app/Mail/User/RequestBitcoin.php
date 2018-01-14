<?php

namespace App\Mail\User;

use App\Models\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestBitcoin extends Mailable
{
    use Queueable, SerializesModels;

    public $emaildata;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emaildata)
    {
        $this->emaildata = $emaildata;
      //  dd( $this->emaildata->touser );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user.request-bitcoins');
    }
}
