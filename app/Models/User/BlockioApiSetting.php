<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class BlockioApiSetting extends Model
{
    protected $table = 'blockio_api_settings';

    protected $fillable = ['account', 'license', 'secret_pin', 'address', 'addresses', 'default_license'];
}
