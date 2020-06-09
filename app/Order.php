<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orderdetails', 'order_number');
    }

    public function Address()
    {
        return $this->hasOne(Address::class, 'order_id');
    }
}
