<?php

namespace App\Models\User;

use Auth;
use App\Models\LoginHistory;
use App\Models\User\Credential;
use App\Models\User\UserWalletAddress;
use App\Models\User\UserTransaction;
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

    public function credential()
    {
        return $this->hasMany(Credential::class);
    }

    public function address()
    {
        return $this->hasMany(UserWalletAddress::class);
    }

    public function transaction()
    {
        return $this->hasMany(UserTransaction::class);
    }

    public function loginHistory()
    {
        return $this->hasMany(LoginHistory::class)->user();
    }

    public function scopeUser($query)
    {
        return $query->where('user_type', 0);
    }

}
