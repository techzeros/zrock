<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Btc_users_address extends Model
{
    //
    public function user_tranasactions()
    {
        return $this->belongsTo(User::class); 
    }

    public function getUserAddress()
    {
        return Btc_users_address::where('user_id', \Auth::user()->id)
        ->where('archived', 0)
        ->orderBy('id', 'desc')
        ->get();
    }



}
