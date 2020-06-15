@extends('layouts.shops')
@section('content')
<div class="container">
    <div class="row product-details justify-content-center">
        <div class="col-12 col-md-6">
            <img src="./images/products/{{ $product->avatar }}" class="img-details">
        </div>
        <div class="col-12 col-md-6 pl-5 pt-md-0 pt-5">
            <div class="row product-name">
                <span>{{ ucfirst($product->name) }}</span>
            </div>
            <div class="product-description">
                <span class="row">{!! $product->description !!}</span>
            </div>
            <div class="product-price">
                <span>Giá bán: <i>@money($product->price,'VND')</i></span>
            </div>
            <div class="product-amount pl-2">
                <span>Còn <i id="total">{{ $product->amount }}</i> sản phẩm</span>
            </div>
            <div class="product-cart">
                <span class="product-minus btn btn-sm">-</span>
                <input class="form-control-sm" id="qty" data-id="{{ $product->id }}" min="1" max="{{ $product->amount }}" type="number" value="1">
                <span class="product-plus btn btn-sm">+</span>
            </div>
            <div class="product-shopping mt-4">
                <button class="btn btn-success">
                    <span class="fa fa-cart-plus"> Thêm vào giỏ hàng</span>
                </button>
            </div>
        </div>  
    </div>
</div>
<div class="container border-top mt-5 pt-3">
    <h3>Chi tiết sản phẩm</h3>
    {!! $product->details !!}
</div>

<div class="container border-top mt-5 pt-3">
    <h3 class="my-4">Sản phẩm liên quan</h3>
    <div class="row" id="sp-lienquan">
    @foreach($product->category->products as $product)
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card shadow mx-auto">
                <div class="card-body h-100">
                    <a class="list-group product-link border-0 rounded-0 p-0 m-0" href="/san-pham/{{ $product->product }}">
                        <div class="product-image p-0 m-0 list-group-item">
                            <img src="./images/products/{{ $product->avatar }}" alt="">
                        </div>
                        <span class="list-group-item product-name">{{ ucfirst($product->name) }}</span>
                    </a>
                </div>
                <div class="card-footer mt-auto d-flex justify-content-between align-items-center">
                    <span class="product-price d-block">
                        @money($product->price, 'VND')
                    </span>
                    <button class="btn btn-shopping ml-auto text-primary" onclick="Obj.cart({{ $product->id }})">
                        <span class="fa fa-2x fa-cart-plus"></span>
                    </button>
                </div>
            </div>
        </div>
        @break($loop->iteration == 4)
    @endforeach
</div>
</div>

@endsection
@push('js')
    <script src="./js/shops/details.js"></script>
@endpush