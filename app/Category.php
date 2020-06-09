<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'category_id');
    }
}
