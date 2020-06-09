<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'name', 'phone', 'address', 'city'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
