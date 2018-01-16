<?php

namespace App\Models\User;

use Auth;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class UserWalletAddress extends Model
{
    protected $table = 'user_wallet_addresses';

    protected $fillable = ['label', 'address', 'user_id', 'license_id', 'available_balance', 'pending_received_balance', 'status', 'archived'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function getUserAddress()
    // {
    //     return BtcUserAddress::where('user_id', Auth::user()->id)
    //     ->where('archived', 0)
    //     ->orderBy('id', 'desc')
    //     ->get();
    // }

    // public static function getUserAddress()
    // {
    //     return BtcUserAddress::where('user_id', Auth::user()->id)
    //     ->where('archived', 0)
    //     ->orderBy('id', 'desc')
    //     ->get();
    // }

}
