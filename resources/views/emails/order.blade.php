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
        <h4>Đặt hàng thành công</h4>
        <p>Cảm ơn bạn đã đặt hàng tại GardernShop</p>
    </div>
    <div style="margin: 20px auto">
        <h3>Chi tiết đơn hàng của bạn</h3>
    </div>
    <table style="border-top: 1px solid;border-bottom: 1px solid; border-collapse: collapse">
        <thead>
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
                </td>
                <td>
                    {{ $cart->name->name }}
                </td>
                <td>
                    {{ $cart->price }}
                </td>
                <td>
                    {{ $cart->quantity }}
                </td>
                <td colspan="2">
                    @money($cart->quantity * $cart->price, "VND")
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">
                    <h3>Tổng</h3>
                </th>
                <th>Số lượng: {{ $data["totalQty"] }}</th>
                <th colspan="2">Thanh toán: @money($data['totalPrice'])</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>