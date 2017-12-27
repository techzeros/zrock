<?php

namespace App\Mail\Admin;

use App\Models\Admin\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginRequestPin extends Mailable
{
    use Queueable, SerializesModels;

    public $admin_name;
    public $login_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Admin $admin, $login_token)
    {
        $this->admin_name = $admin->name;
        $this->login_link = route('admin.login', ['email' => $admin->email, 'token' => $login_token]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.admin.login-request-pin');
    }
}
