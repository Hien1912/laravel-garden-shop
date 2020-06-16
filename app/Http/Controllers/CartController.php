<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\AddressRequest;
use App\Mail\OrderMail;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        $citylist = ["Hà Nội", "Hồ Chí Minh", "Đắk Lắk", "Hà Tĩnh", "Điện Biên", "Nghệ An", "Tiền Giang", "Hải Phòng", "An Giang", "Bà Rịa - Vũng Tàu", "Bắc Giang", "Bắc Kạn", "Bạc Liêu", "Bắc Ninh", "Bến Tre", "Bình Định", "Bình Dương", "Bình Phước", "Bình Thuận", "Cà Mau", "Cao Bằng", "Đắk Nông", "Đồng Nai", "Đồng Tháp", "Gia Lai", "Hà Giang", "Hà Nam", "Hải Dương", "Hậu Giang", "Hòa Bình", "Hưng Yên", "Khánh Hòa", "Kiên Giang", "Kon Tum", "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Long An", "Nam Định", "Ninh Bình", "Ninh Thuận", "Phú Thọ", "Quảng Bình", "Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa", "Thừa Thiên Huế", "Trà Vinh", "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái", "Phú Yên", "Cần Thơ", "Đà Nẵng"];
        $carts = Cart::getContent();
        $totalQty = Cart::getTotalQuantity();
        $totalPrice = Cart::getTotal();
        return view('shops.cart', compact('carts', 'totalQty', 'totalPrice', 'citylist'));
    }

    public function add($id, $qty)
    {
        $product = Product::find($id);
        $cart = Cart::get($id);
        if ($cart) {
            if ($qty > 1) {
                Cart::update($id, [
                    'quantity' => [
                        'relative' => false,
                        'value' => $qty
                    ]
                ]);
                $msg = 1;
            } else {
                Cart::update($id, [
                    'quantity' => 1
                ]);
                $msg = 1;
            }
        } else {
            Cart::add($id, $product, $product->price, $qty);
            $msg = 0;
        }

        $totalQty = Cart::getTotalQuantity();
        $total = Cart::getTotal();
        $data = ["name" => $product->name, "qty" => $totalQty,  'price' => $total, "msg" => $msg];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        Cart::remove($id);

        $totalQty = Cart::getTotalQuantity();
        $total = Cart::getTotal();
        $data = ["qty" => $totalQty,  'price' => $total];

        return response()->json($data, 200);
    }

    public function order()
    {
        $citylist = ["Hà Nội", "Hồ Chí Minh", "Đắk Lắk", "Hà Tĩnh", "Điện Biên", "Nghệ An", "Tiền Giang", "Hải Phòng", "An Giang", "Bà Rịa - Vũng Tàu", "Bắc Giang", "Bắc Kạn", "Bạc Liêu", "Bắc Ninh", "Bến Tre", "Bình Định", "Bình Dương", "Bình Phước", "Bình Thuận", "Cà Mau", "Cao Bằng", "Đắk Nông", "Đồng Nai", "Đồng Tháp", "Gia Lai", "Hà Giang", "Hà Nam", "Hải Dương", "Hậu Giang", "Hòa Bình", "Hưng Yên", "Khánh Hòa", "Kiên Giang", "Kon Tum", "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Long An", "Nam Định", "Ninh Bình", "Ninh Thuận", "Phú Thọ", "Quảng Bình", "Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa", "Thừa Thiên Huế", "Trà Vinh", "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái", "Phú Yên", "Cần Thơ", "Đà Nẵng"];

        return response()->view('shops.partial.order', compact('citylist'), 200);
    }

    public function store(AddressRequest $request)
    {
        $carts = Cart::getContent();
        if ($carts) {
            $order = new Order();
            $order->totalquantity = Cart::getTotalQuantity();
            $order->total = Cart::getTotal();
            $order->save();
            foreach (Cart::getContent() as $product) {
                $order->products()->attach(Product::find($product->id), ['quantity' => $product->quantity, 'price' => $product->price]);
            }

            $order->Address()->create($request->all());
            // Cart::clear();

            $details = DB::table('orderdetails')->where('order_number', '=', $order->id)->get();
            $address = $order->Address;

            $data = $request->all();
            $data['totalQty'] = Cart::getTotalQuantity();
            $data['totalPrice'] = Cart::getTotal();

            Mail::to("$request->email")->send(new OrderMail($carts, $data));

            return response()->view('shops.checkout', compact('details', 'address', 'order'), 200);
        }
    }

    private function sendmail($details)
    {
        Mail::to('hienvh00@gmail.com')->send(new OrderMail($details));
    }
}
