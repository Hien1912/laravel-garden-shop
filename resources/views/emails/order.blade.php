<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

</style>
<body>
    <div>
        <h2>Đặt hàng thành công</h2>
        <p>Cảm ơn bạn đã đặt hàng tại GardenShop</p>
    </div>
    <div style="margin: 20px auto">
        <h2>Chi tiết đơn hàng của bạn</h2>
    </div>
    <table style="border-top: 1px solid;border-bottom: 1px solid; border-collapse: collapse">
        <thead style="border-bottom: 1px solid">
            <th>#</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
        </thead>
        <tbody>
        @foreach ($carts as $cart)
            <tr>
                <td>
                    <img src="{{ $message->embed(asset("images/products/" . $cart->name->avatar . "")) }}" width="75px" height="75px">
                    {{-- <img src="{{ asset("images/products/" . $cart->name->avatar . "") }}" width="75px" height="75px"> --}}
                </td>
                <td>
                    {{ $cart->name->name }}
                </td>
                <td style="text-align: right">
                    @money($cart->price, "VND")
                </td>
                <td style="text-align: right">
                    {{ $cart->quantity }}
                </td>
                <td colspan="2" style="text-align: right">
                    @money($cart->quantity * $cart->price, "VND")
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot style="border-top:1px solid">
            <tr>
                <th colspan="3">
                    <h3>Tổng</h3>
                </th>
                <th style="text-align: right">Số lượng: {{ $data["total_quantity"] }}</th>
                <th colspan="2" style="text-align: right">Thanh toán: @money($data['total_price'],"VND")</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>