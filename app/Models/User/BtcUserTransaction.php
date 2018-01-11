<?php

namespace App\Models\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class BtcUserTransaction extends Model
{
    protected $table = 'btc_users_transactions';
    protected $fillable = ['user_id', 'type', 'recipient', 'sender', 'time', 'confirmations', 'txid'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
