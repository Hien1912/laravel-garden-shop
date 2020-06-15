@foreach($products as $product)
<div class="col-12 col-md-6 col-lg-4">
    <div class="card shadow mx-auto">
        <div class="card-body h-100">
            <a class="list-group product-link border-0 rounded-0 p-0 m-0" href="{{ route("product-details", $product->id) }}">
                <div class="product-image p-0 m-0 list-group-item">
                    <img src="./images/products/{{ $product->avatar }}" alt="">
                </div>
                <span class="list-group-item product-name">{{ ucfirst($product->name) }}</span>
            </a>
        </div>
        <div class="card-footer mt-auto d-flex justify-content-between align-items-center">
            <span class="d-block">
                Giá:&nbsp;<i class="product-price">@money($product->price, 'VND')</i>
            </span>
            <button title="Thêm vào giỏ hàng" class="btn btn-shopping ml-auto text-primary" onclick="Obj.cart({{ $product->id }})">
                <span class="fa fa-2x fa-cart-plus"></span>
            </button>
        </div>
    </div>
</div>
@endforeach
{!! $products->links('pagination.more') !!}