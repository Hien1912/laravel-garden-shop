<div class="row">
<div class="col-md-12 col-lg-8">
    <div class="items">
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Avatar</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $item)
                    @php $product = App\Product::find($item->product_id) @endphp
                        <tr>
                            <td>
                                <img src="{{ $product->avatar }}" style="width: 8vw; height: 6vw">
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                {{ $item->quantity }}
                            </td>
                            <td>
                                @money($item->price, 'VND')
                            </td>
                            <td>
                                @money($item->price * $item->quantity, 'VND')
                            </td>
                        </tr>
                    @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">
                        Tổng
                    </th>
                    <th colspan="2">
                        {{ $order->totalquantity }}
                    </th>
                    <th>
                        @money($order->total, 'VND')
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
    <div class="col-md-12 col-lg-4 pl-2">
        <h3>Địa chỉ thanh toán</h3>
        <address>
            Họ và Tên: {{ ucwords($order->Address->name) }},<br>
            Số điện thoại: {{ $order->Address->phone }},<br>
            Địa chỉ: {{ ucwords($order->Address->address) }}, {{ ucwords($order->Address->city) }}
        </address>
    </div>
</div>
