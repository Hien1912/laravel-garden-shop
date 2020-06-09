<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;
        $tag = $request->tag;
        if ($search) {
            $products = Product::where('name', 'like', "%$search%")->paginate();
        }
        elseif ($category) {
            $products = Category::find($category)->products()->paginate();
        }
        elseif($tag){
            $products = Tag::find($tag)->products()->paginate();
        }
        else{
            $products =  Product::paginate(12);
        }

        $category = Category::all();

        return view('shops.index', compact(['products', 'category']));
    }

    public function paginate(Request $request)
    {
        $search = $request->search;
        $category = $request->category;
        $tag = $request->tag;
        if ($search) {
            $products = Product::where('name', 'like', "%$search%")->paginate();
        }
        elseif ($category) {
            $products = Category::find($category)->products()->paginate();
        }
        elseif($tag){
            $products = Tag::find($tag)->products()->paginate();
        }
        else{
            $products =  Product::paginate(12);
        }

        return view('shops.list', compact('products'));
    }
}