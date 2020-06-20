<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'details', 'amount', 'category_id', 'avatar'
    ];
    protected $casts = [
        'avatar' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_product', 'product_id', 'tag_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orderdetails', 'product_id', 'order_number')->withPivot('price', 'quantity');
    }

    /**
     * Scope a query to only include 
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategoryId($query, $category)
    {
        return $query->where('category_id', $category)->orderBy("created_at", "DESC");
    }
}
