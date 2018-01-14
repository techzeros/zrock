<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class BtcPrice extends Model
{
    protected $table = 'coin_prices';
    
    protected $fillable = ['source', 'price', 'currency'];
}
