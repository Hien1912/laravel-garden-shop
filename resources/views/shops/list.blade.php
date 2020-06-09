@foreach($products as $product)
<div class="col-md-4 mb-2 px-1 h-100 w-100">
    <div class="card shadow h-100 w-100">
        <a href="/san-pham/{{ $product->id }}" class="h-75 w-100">
            <img class="card-img-top img-product w-100 h-100" src="{{ $product->avatar }}" alt="">
        </a>
        <div class="card-body h-25">
            <h6 class="border-bottom pb-2">
                <a href="/san-pham/{{ $product->id }}" class="card-title text-decoration-none text-lg-left">{{ $product->name }}</a>
            </h6>
            <div class="card-text d-flex">
                <p class="text-danger pt-2">
                    @money($product->price, 'VND')
                </p>
                <button class="btn btn-outline-primary ml-auto cart-btn" onclick="addToCart('{{ $product->id }}','{{ $product->name }}')">
                    <i class="fa fa-cart-plus fa-2x"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
{!! $products->links('pagination.more') !!}