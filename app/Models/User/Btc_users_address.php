<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Btc_users_address extends Model
{
    //
    public function user_tranasactions()
    {
        return $this->belongsTo('Btc_users_transaction'); 
    }
}
