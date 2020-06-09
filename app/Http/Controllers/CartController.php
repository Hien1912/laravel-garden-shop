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
    protected $cart = [];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session()->has('cart')) {
                $this->cart = session()->pull('cart');
            }
            
            return $next($request);
        });
    }

    public function index()
    {
        return view('shops.cart');
    }

    public function add(Request $request)
    {
        $product = Product::find($request->id);
        Cart::add([
            'id' => $request->id, 
            'name' => $product->name, 
            'price' => $product->price, 
            'quantity' => $request->qty,
            'attributes' => [
                'avatar' => $product->avatar,
                'amount' => $product->amount
            ]
        ]);
    }

    public function update(Request $request)
    {
        Cart::update($request->id, [
            'quantity' => [
            'relative' => false,
            'value' => $request->quantity
            ]
        ]);

        // return back();
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
        foreach(Cart::getContent() as $product)
        {
            $order->products()->attach(Product::find($product->id), ['quantity'=>$product->quantity, 'price'=>$product->price]);
        }

        $order->Address()->create($request->all());
        Cart::clear();

        $details = DB::table('orderdetails')->where('order_number', '=', $order->id)->get();
        $address = $order->Address;

        return view('shops.checkout', compact(['details', 'address', 'order']));
    }
}
