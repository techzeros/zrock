<?php

namespace App\Models\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    protected $table = 'user_transactions';

    protected $fillable = ['user_id', 'type', 'recipient', 'sender', 'time', 'confirmations', 'txid'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
