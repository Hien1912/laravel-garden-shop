<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;
        $tag = $request->tag;
        if ($search) {
            $products = Product::where('name', 'like', "%$search%")->paginate();
        } elseif ($category) {
            $products = Category::find($category)->products()->paginate();
        } elseif ($tag) {
            $products = Tag::find($tag)->products()->paginate();
        } else {
            $products =  Category::find('bonsai')->products()->paginate(12);
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
        } elseif ($category) {
            $products = Category::find($category)->products()->paginate();
        } elseif ($tag) {
            $products = Tag::find($tag)->products()->paginate();
        } else {
            $products =  Category::find('bonsai')->products()->paginate(12);
        }

        return view('shops.partial.product', compact("products"));
    }

    public function details($id)
    {
        $product = Product::find($id);

        return view('shops.details', compact("product"));
    }

    public function contact()
    {
        if (view()->exists('shops.contact')) {
            return view("shops.contact");
        }
        abort(404);
    }

    public function about()
    {
        if (view()->exists('shops.about')) {
            return view("shops.about");
        }
        abort(404);
    }
}
