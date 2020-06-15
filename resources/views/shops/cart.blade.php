@extends('layouts.shops')
@section('content')
@php $citylist = ["Hà Nội","Hồ Chí Minh","Đắk Lắk","Hà Tĩnh","Điện Biên","Nghệ An","Tiền Giang","Hải Phòng","An Giang","Bà Rịa - Vũng Tàu","Bắc Giang","Bắc Kạn","Bạc Liêu","Bắc Ninh","Bến Tre","Bình Định","Bình Dương","Bình Phước","Bình Thuận","Cà Mau","Cao Bằng","Đắk Nông","Đồng Nai","Đồng Tháp","Gia Lai","Hà Giang","Hà Nam","Hải Dương","Hậu Giang","Hòa Bình","Hưng Yên","Khánh Hòa","Kiên Giang","Kon Tum","Lai Châu","Lâm Đồng","Lạng Sơn","Lào Cai","Long An","Nam Định","Ninh Bình","Ninh Thuận","Phú Thọ","Quảng Bình","Quảng Nam","Quảng Ngãi","Quảng Ninh","Quảng Trị","Sóc Trăng","Sơn La","Tây Ninh","Thái Bình","Thái Nguyên","Thanh Hóa","Thừa Thiên Huế","Trà Vinh","Tuyên Quang","Vĩnh Long","Vĩnh Phúc","Yên Bái","Phú Yên","Cần Thơ","Đà Nẵng"] @endphp
<div class="container mt-5 row">
	@forelse ($carts as $product)
		<div class="row mx-auto	 col-12 col-lg-8 py-1 border-bottom border-top cart-details">
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
						<div class="btn-group border text-center">
							<span class="btn border-right" id="qty-minus">-</span>
							<input id="qty-val" max="{{ $product->name->amount }}" type="number" readonly onchange="Obj.cart({{ $product->id }}, this.value)" value="{{ $product->quantity }}"">
							<span class="btn border-left" id="qty-plus">+</span>
						</div>
					</div>
					<div class="col-5 col-md-3">
						<span class="btn pl-sm-0 text-warning" onclick="Obj.delete($product->id)">Xóa</span>
					</div>
				</div>
			</div>
		</div>
	@empty
		
	@endforelse
</div>
@endsection
@push('js')
	<script src="./js/shops/cart.js"></script>
@endpush