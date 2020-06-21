<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class OrderController extends Controller
{
    public function index()
    {
        $status = explode(".", Route::currentRouteName())[1];
        return view('admin.order')->with(['order' => "true", "$status" => "true"]);
    }

    public function getByStatus($status)
    {
        $orders = Order::Status($status)->get()->each(function ($order) {
            $order->products;
        });

        return response()->json($orders, 200);
    }

    public function getById($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->products;
            return response()->json($order, 200);
        }

        return response()->json("Order not found!", 404);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order = $order->update($request->all());
            return response()->json($order, 200);
        }
        return response()->json("Order not found!", 404);
    }
}
