<?php

namespace App\Repository\User\Eloquent;

use App\Models\User\User;
use App\Repository\User\Contracts\UserInterface;

class UserRepository implements UserInterface
{
	protected $user;

    /**
     * Create a new User Repository instance
     * 
     * @return void
     */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

    /**
     * Set the verified status to true and make the email token null
     * 
     * @return void
     */
    public function activateUser()
    {
        $this->activated = 1;
        $this->email_token = null;
        $this->save();
    }

    public function userAgent()
    {
        return \Browser::detect();
    }

    public function all()
    {
        return $this->user->all();
    }
   
}