@extends('layouts.shops')
@section('content')
<div class="container mt-5 mx-auto row">
	@if(count($carts) > 0)
		<div class="mx-auto col-12 col-lg-8" id="list-cart">
			@foreach ($carts as $product)
				<div class="row py-1 border-bottom border-top cart-details" id="row-{{ $product->id }}">
					<img class="col img-cart mr-sm-4" src="./images/products/{{ $product->name->avatar }}" alt="">
					<div class="col">
						<div class="row w-100">
							<div class="col-7 col-md-9">
								<a class="text-decoration-none" href="{{ route('product-details', $product->id) }}">{{ $product->name->name }}</a>
							</div>
							<div class="col-5 col-md-3">
								<span class="price" style="min-width: 100px !important">@money( $product->price, "VND")</span>
							</div>
						</div>
						<div class="row mt-2 w-100">
							<div class="col-7 col-md-9">
								<div class="btn-group border text-center cart-option">
									<span class="btn border-right qty-minus">-</span>
									<input class="qty-val" data-id="{{ $product->id }}" max="{{ $product->name->amount }}" type="number" disabled value="{{ $product->quantity }}">
									<span class="btn border-left qty-plus">+</span>
								</div>
							</div>
							<div class="col-5 col-md-3">
								<span class="btn pl-sm-0 text-warning" onclick="Obj.cartDelete({{ $product->id }}, this)">Xóa</span>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="border col-12 col-lg-4 total mt-5 mt-lg-0">
			<h2 class="mx-auto text-center mt-2 mb-3">Tổng</h2>
			<div class="mx-2 row">
				<span class="col-7">Tổng sản phẩm: </span>
				<span class="col-5 ml-auto text-right" id="totalQty">{{ $totalQty }}</span>
			</div>
			<div class="mx-2 row">
				<span class="col-7">Tổng thanh toán:  </span>
				<span class="col-5 ml-auto text-right" id="totalPrice">@money($totalPrice, 'VND')</span>
			</div>
			<a href="#order-collapse" data-toggle="collapse" class="d-block mx-auto text-center btn btn-success mb-3 mt-5">Đặt hàng</a>
			<div id="order-collapse" class="collapse">
				@include('shops.partial.order')
			</div>
		</div>
	@else
		<div class="my-5 container">
			<div class="text-center">
				<h3>Giỏ hàng trống</h3>
				<a href="/" class="btn btn-success text-decoration-none">Trang sản phẩm</a>
			</div>
		</div>
	@endif
	</div>
</div>
@endsection
@push('js')
	<script src="./js/shops/cart.js"></script>
@endpush