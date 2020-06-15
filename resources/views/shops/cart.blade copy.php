@extends('layouts.shops')
@section('content')
@php $citylist = ["Hà Nội","Hồ Chí Minh","Đắk Lắk","Hà Tĩnh","Điện Biên","Nghệ An","Tiền Giang","Hải Phòng","An Giang","Bà Rịa - Vũng Tàu","Bắc Giang","Bắc Kạn","Bạc Liêu","Bắc Ninh","Bến Tre","Bình Định","Bình Dương","Bình Phước","Bình Thuận","Cà Mau","Cao Bằng","Đắk Nông","Đồng Nai","Đồng Tháp","Gia Lai","Hà Giang","Hà Nam","Hải Dương","Hậu Giang","Hòa Bình","Hưng Yên","Khánh Hòa","Kiên Giang","Kon Tum","Lai Châu","Lâm Đồng","Lạng Sơn","Lào Cai","Long An","Nam Định","Ninh Bình","Ninh Thuận","Phú Thọ","Quảng Bình","Quảng Nam","Quảng Ngãi","Quảng Ninh","Quảng Trị","Sóc Trăng","Sơn La","Tây Ninh","Thái Bình","Thái Nguyên","Thanh Hóa","Thừa Thiên Huế","Trà Vinh","Tuyên Quang","Vĩnh Long","Vĩnh Phúc","Yên Bái","Phú Yên","Cần Thơ","Đà Nẵng"] @endphp
<main class="page shopping-cart-page">
	<section class="clean-block clean-cart dark">
		<div class="container">
			<div class="block-heading">
				<h2 class="text-info my-4">Giỏ hàng của bạn</h2>
			</div>
			<div class="content">
				<div class="row no-gutters">
					<div class="col-md-12 col-lg-8">
						<div class="items">
							@forelse (Cart::getContent() as $product)
							<div class="product border-bottom pl-0 mr-5" id="product{{ $product->id }}">
								@php
									$product = Cart::get($product->id);
								@endphp
								<div class="row justify-content-center align-items-center">
									<div class="col-md-4">
										<div class="product-image">
											<img class="img-thumbnail d-block mr-auto" src="{{ $product->attributes->avatar }}" style="width: 8vw; height: 6vw;">
										</div>
									</div>
									<div class="col-md-8 product-info">
										<a class="text-decoration-none btn btn-link" href="#">
											{{ $product->name }}
										</a>
										<div class="row pl-3">
											<button class="col-1 btn" title="Xóa sản phẩm" data-id="{{ $product->id }}" onclick="deleteProduct(this)">
												<span class="fa fa-close"></span>
											</button>
											<div class="col-3 quantity">
												<input type="number" min="1" max="{{ $product->attributes->amount }}"
													class="form-control text-center quantity-input form-control-sm"
													value="{{ $product->quantity }}" data-id="{{ $product->id }}"
													onchange="updateCart(this)">
											</div>
											<div class="col-8 price{{ $product->id }} text-danger text-left">
												<span>@money($product->price * $product->quantity , 'VND')</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							@empty
							<h4>Giỏ hàng trống</h4>
							@endforelse
						</div>
					</div>
					@forelse (Cart::getContent() as $product)
						<div class="col-md-12 col-lg-4 total">
							<div class="summary">
								<h3>Tóm tắt</h3>
								<h4 class="border-top p-3">
									<span class="text">Tổng số sản phẩm: </span>
									<span
										class="total product">{{ Cart::getTotalQuantity() }}</span>
								</h4>
								<h4 class="pl-3">
									<span class="text">Tổng thanh toán: </span>
									<span class="price"></span>@money(Cart::getTotal(), 'VND')</h4>
									<button class="btn btn-primary btn-block drop" data-target="#my-collapse" data-toggle="collapse">
										Đặt hàng</button>
									<div id="my-collapse" class="collapse">
										<form action="{{ route('dat-hang') }}" method="post" class="row">
											@csrf
											<div class="form-group col-md-12">
												<label>Họ Và Tên</label>
												@error('name')
												<div class="alert alert-danger" role="alert">
													{{ $message }}
												</div>
												@enderror
												<input class="form-control" type="text" name="name" required value="{{ old('name') }}">
											</div>
											<div class="form-group col-md-12">
												<label>Số diện thoại</label>
												@error('phone')
												<div class="alert alert-danger" role="alert">
													{{ $message }}
												</div>
												@enderror
												<input class="form-control" type="tel" name="phone" required value="{{ old('phone') }}">
											</div>
											<div class="form-group col-md-12">
												<label>Địa chỉ</label>
												@error('address')
												<div class="alert alert-danger" role="alert">
													{{ $message }}
												</div>
												@enderror
												<input class="form-control" type="text" name="address" required value="{{ old('address') }}">
											</div>
											<div class="form-group col-md-12">
												<label>Tỉnh/Thành Phố</label>
												@error('city')
												<div class="alert alert-danger" role="alert">
													{{ $message }}
												</div>
												@enderror
												<input class="form-control" type="text" name="city" required value="{{ old('city') }}" list="citylist">
												<datalist id="citylist">
													@foreach($citylist as $city)
													<option value="{{ ucfirst($city) }}">
													@endforeach
												</datalist>
											</div>
											<div class="col clearfix">
												<button type="submit" class="btn btn-success float-right">Xác nhận</button>
											</div>
										</form>
									</div>
							</div>
						</div>
						@php
							break
						@endphp
					@empty
					@endforelse
				</div>
			</div>
		</div>
	</section>
</main>

@if ( $errors->count() > 0 )
<script>
	$('.drop').click();
</script>
@endif
<script>
	$(document).ready(function() {});

	function updateCart(inp) {
		let id = $(inp).data('id');
		let min = +$(inp).attr('min');
		let max = +$(inp).attr('max');
		let val = +$(inp).val();
		if (min > val){
			$(inp).val(1);
		}

		if (max < val){
			$(inp).val(max);
		}

		if (val <= max) {
			$.ajax({
				url: '/cart',
				method: 'patch',
				data: {
					'_token': $('meta[name=token]').attr('content'),
					'id': $(inp).data('id'),
					'quantity': $(inp).val()
				},
				success: function(data) {
					$(`#product${id}`).load(` #product${id}`);
					$(`.total`).load(` .summary`);
					Command: toastr["success"]("Cập nhật thành công");
				},
				error: function() {
					Command: toastr["error"]("Lỗi");
				}
			});
		}
		else{
			$(`#product${id}`).load(` #product${id}`);
			Command: toastr["success"](`Xin lỗi số sản phẩm còn lại chỉ còn ${max}`);
		}
		
	}

	function checkOut() {
		location.href = '/check-out';
	}

	function deleteProduct(btn){
		$.ajax({
			url: '/cart/	' + $(btn).data('id'),
			method: 'delete',
			data: {
				'_token': $('meta[name=token]').attr('content')
			},
			success: function(){
				$('.content').load(' .content');
			},
			error: function(){
				Command: toastr["error"]("Lỗi");
			}

		});
	}
</script>
@endsection