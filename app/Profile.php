<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
