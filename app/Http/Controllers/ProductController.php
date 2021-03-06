<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function index()
    {
        $category = explode(".", Route::currentRouteName())[1];
        return view("admin.product")->with(['product' => "true", $category => "true"]);
    }

    public function getByCategoryId($category_id)
    {
        $products = Product::CategoryId($category_id)->get()->each(function ($product) {
            $product->category;
            $product->tags;
        });

        return response()->json($products, 200);
    }

    public function findById($id)
    {
        $product = Product::withTrashed()->find($id);

        if ($product) {
            $product->tags;
            $product->category;
            return response()->json($product, 200);
        }

        return response()->json($product, 404);
    }

    public function create(ProductRequest $request)
    {
        $data = $request->except(['avatar', "tag_id"]);
        $tags = $request->tag_id;

        $product = Product::create($data);

        if ($product) {
            $product->tags()->sync($tags);
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                $ext =  $file->getClientOriginalExtension();
                $avatar =  "product_$product->id.$ext";

                if (file_exists("images/products/" . $avatar)) {
                    unlink("images/products/$avatar");
                }

                $file->move("images/products/", $avatar);

                $product = $product->update(['avatar' => $avatar]);
            }

            return response()->json($product, 201);
        }

        return response()->json($product, 500);
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->except(['avatar', "tag_id"]);

        $product = Product::find($id);

        if ($product) {
            $tags = $request->tag_id;
            $product->tags()->sync($tags);
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                $ext =  $file->getClientOriginalExtension();
                $avatar =  "product_$product->id.$ext";

                if (file_exists("images/products/" . $avatar)) {
                    unlink("images/products/$avatar");
                }

                $file->move("images/products/", $avatar);

                $data['avatar'] = $avatar;
            }

            $product = $product->update($data);

            return response()->json($product, 200);
        }

        return response()->json($product, 404);
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();

            return response()->json("Move trash success", 200);
        }

        return response()->json("Not found!", 404);
    }

    public function getTrash()
    {
        $products = Product::onlyTrashed()->orderBy('deleted_at', "DESC")->get()->each(function ($product) {
            $product->category;
            $product->tags;
        });

        return response()->json($products, 200);
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);

        if ($product) {
            $product->restore();

            return response()->json("Restore success!", 200);
        }

        return response()->json("Not found!", 200);
    }

    public function destroy($id)
    {
        $product = Product::onlyTrashed()->find($id);
        if ($product) {
            $product->tags()->detach();
            $product->orders()->detach();
            $product->forceDelete();

            return response()->json("Delete success!", 200);
        }

        return response()->json("Not found!", 200);
    }
}
