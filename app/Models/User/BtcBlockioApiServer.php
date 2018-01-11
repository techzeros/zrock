<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class BtcBlockioApiServer extends Model
{
    protected $table = 'btc_blockio_api_servers';
    protected $fillable = ['account', 'license', 'secret_pin', 'address', 'addresses', 'default_license'];
}
