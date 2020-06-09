@extends('layouts.shops')
@section('content')
<style>
	img.image {
		width: 150px;
		height: 100px;
	}
</style>
<main class="page shopping-cart-page">
	<section class="clean-block clean-cart dark">
		<div class="container">
			<div class="block-heading">
				<h2 class="text-info my-4">Đơn hàng của bạn</h2>
			</div>
			<div class="content">
				<div class="row no-gutters">
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
                                    @foreach ($details as $item)
                                    @php  $product = App\Product::find($item->product_id) @endphp
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
                                            @money($item->quantity * $item->price, 'VND')
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
                    @if (count($details) > 0)
					<div class="col-md-12 col-lg-4 pl-2">
                        <h3>Địa chỉ thanh toán</h3>
                        <address>
                            Họ và Tên: {{ ucwords($address->name) }},<br>
                            Số điện thoại: {{ $address->phone }},<br>
                            Địa chỉ: {{ ucwords($address->address) }}, {{ ucwords($address->city) }}
                        </address>
                        <h3>
                            Cảm ơn bạn đã mua hàng từ chúng tôi. Đơn hàng của bạn sẽ được chúng tôi liên hệ để xác nhận trong giây lát
                        </h3>
                    </div>                        
                    @endif
				</div>
			</div>
		</div>
	</section>
</main>
@endsection