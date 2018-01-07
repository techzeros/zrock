<?php

namespace App\Models\User;

use Auth;
use App\Models\User\Credential;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_token', 'activated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Set the verified status to true and make the email token null
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

    public function crendentials()
    {
        return $this->hasMany(Credential::class);
    }

    public function btc_users_address()
    {
        return $this->hasMany(Btc_users_address::class);
    }

    public function isIdentified()
    {
        $userId = Auth::guard('web')->id;

        // if ($this->credentials->user_id == $userId)







        if (($this->is_identified == 1) && ($this->credentials->docType() == true)) {
            return true;
        }

        return false;
    }
}
