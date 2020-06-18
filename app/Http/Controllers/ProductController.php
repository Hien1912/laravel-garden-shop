<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category_id)
    {
        dd($category_id);
        return view("admin.product")
            ->with('sidebar', ['sanpham' => true]);
    }

    public function getByCategoryId($category_id)
    {
        $product = Product::CategoryId($category_id)->get();
    }
}
