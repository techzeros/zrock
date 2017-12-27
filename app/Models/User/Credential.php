<?php

namespace App\Models\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    protected $fillable = ['user_id', 'doc_type', 'doc', 'doc_approved'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
