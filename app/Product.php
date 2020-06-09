<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'details', 'amount', 'category_id', 'avatar'
    ];
    protected $casts = [
        'avatar' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_product', 'product_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orderdetails', 'product_id');
    }

}
