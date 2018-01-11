<?php

namespace App\Models\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class BtcUserAddress extends Model
{
    protected $table = 'btc_users_addresses';
    protected $fillable = ['label', 'address', 'user_id', 'license_id', 'available_balance', 'pending_received_balance', 'status', 'archived'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
