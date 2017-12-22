<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminLoginRequest extends Model
{
    protected $fillable = ['admin_id', 'login_token'];
}
