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
    <table class="table table-light">
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
                    {{ $cart->quantity }}
                </td>
                <td>
                    {{ $cart->price }}
                </td>
                <td>
                    @money($cart->quantity * $cart->price, "VND")
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">
                    <h3>Tổng:</h3>
                </th>
                <th>Số lượng{{ $data["totalQty"] }}</th>
                <th colspan="2">Tổng thanh toán: @money($data['totalPrice'])</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>