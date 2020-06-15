<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\AddressRequest;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        return view('shops.cart');
    }

    public function add($id, $qty)
    {
        $product = Product::find($id);
        $cart = Cart::get($id);
        if ($cart) {
            Cart::update($id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $qty
                ]
            ]);
            $msg = 1;
        } else {
            Cart::add($id, $product->name, $product->price, 1, [
                'avatar' => $product->avatar,
                'amount' => $product->amount
            ]);

            dd(13131);
            $msg = 0;
        }

        $totalQty = Cart::getTotalQuantity();
        $total = Cart::getTotal();
        $data = ["name" => $product->name, "qty" => $totalQty,  'price' => $total, "msg" => $msg];

        return response()->json($data, 200);
    }

    public function update($id, $qty)
    {
        $id = substr($id, 4, $id[3]);
        $product = Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $qty
            ]
        ]);

        $name = Cart::get($id)->name;
        $totalQty = Cart::getTotalQuantity();
        $total = Cart::getTotal();

        $data = ["name" => $name, "qty" => $totalQty, "price" => $total, 'msg' => 1];

        return response()->json($product, 200);
    }

    public function delete($id)
    {
        Cart::remove($id);
    }

    public function store(AddressRequest $request)
    {
        $order = new Order();
        $order->totalquantity = Cart::getTotalQuantity();
        $order->total = Cart::getTotal();
        $order->save();
        foreach (Cart::getContent() as $product) {
            $order->products()->attach(Product::find($product->id), ['quantity' => $product->quantity, 'price' => $product->price]);
        }

        $order->Address()->create($request->all());
        Cart::clear();

        $details = DB::table('orderdetails')->where('order_number', '=', $order->id)->get();
        $address = $order->Address;

        return view('shops.checkout', compact(['details', 'address', 'order']));
    }
}
