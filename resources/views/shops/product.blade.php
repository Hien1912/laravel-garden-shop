@extends('layouts.shops')
@section('content')
<main class="page product-page">
    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-content">
                <div class="product-info border-bottom pb-2">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="{{ $product->avatar }}" alt="" class="img-thumbnail ml-auto">
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h3>{{ ucfirst($product->name) }}</h3>
                                <div class="summary">
                                    <p>{!! $product->description !!}</p>
                                </div>
                                <div class="rating">

                                </div>
                                <div class="price">
                                    <h3 class="text-danger">@money($product->price,'VND')</h3>
                                </div>
                                <style>
                                    .left {
                                        border-radius: 50% 0 0 50% !important;
                                    }

                                    .right {
                                        border-radius: 0 50% 50% 0 !important;
                                    }
                                </style>
                                <ul class="nav py-2">
                                    <li class="nav-item">
                                        <span class="material-icons btn btn-warning rounded-0 left">
                                            remove
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        <input type="number" min="1" max="{{ $product->amount }}" value="1"
                                            id="amount" class="form-control text-center rounded-0">
                                    </li>
                                    <li class="nav-item">
                                        <span class="material-icons btn btn-warning rounded-0 right">
                                            add
                                        </span>
                                    </li>
                                    <li class="nav-item ml-2">
                                        <button class="btn btn-primary add-product-to-cart"
                                            data-id="{{ $product->id }}" type="button">
                                            <i class="icon-basket"></i>Add to Cart
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <div>
                        <h3 class="my-2 ml-3">Chi tiết sản phẩm</h3>
                        <div class="ml-3 p-4">
                            {{ $product->details }}
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <h3 class="ml-3">Sản phẩm liên quan</h3>
                    <div>
                        <div class="row justify-content-center">
                            @if (count($product->tags)>0)
                                @foreach (App\Tag::find($product->tags[0]->id)->products()->take(4)->get() as $item)
                                <div class="col-sm-6 col-md-4 col-lg-3 px-1 mb-5 shadow pb-2 products">
                                    <div class="clean-product-item">
                                        <div class="image">
                                            <a href="/san-pham/{{ $item->id }}">
                                                <img class="img-fluid d-block mx-auto" src="{{ $item->avatar }}">
                                            </a>
                                        </div>
                                        <div class="item-name ml-3 mt-2">
                                            <a href="/san-pham/{{ $item->id }}" class="text-decoration-none">
                                                {{ ucfirst($item->name) }}
                                            </a>
                                        </div>
                                        <hr class="text bg-danger">
                                        <div class="about ml-3 d-flex justify-content-between">
                                            <div class="mt-2">
                                                <span class="text-danger">Giá
                                                    {{ number_format($item->price, 0, '',',') }}.đ</span>
                                            </div>
                                            <div class="btn btn-outline-primary mr-4 add-to-cart"
                                                title="Thêm vào giỏ hàng" data-id="{{ $item->id }}">
                                                <span class="material-icons">
                                                    add_shopping_cart
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
                                
<script>
    $(document).ready(function() {
        
        $('.left').click(function() {
            let val = +$('#amount').val();
            let min = +$('#amount').attr('min');
            val > min ? $('#amount').val(--val) : $('#amount').val(
                min);
        });

        $('.right').click(function() {
            let val = +$('#amount').val();
            let max = $('#amount').attr('max');
            val < max ? $('#amount').val(++val) : $('#amount').val(
                max)
        });

        $('#amount').change(function() {
            let min = +$(this).attr('min');
            let max = +$(this).attr('max');
            let val = +$(this).val();
            if (min > val)
                $(this).val(1);
            if (max < val)
                $(this).val(max);
        });

        $('.add-product-to-cart').click(function() {
            let quantity = $('#amount').val();
            $.ajax({
                url: '/cart',
                method: 'post',
                data: {
                    '_token': $('meta[name=token]').attr('content'),
                    'id': $(this).data('id'),
                    'qty': quantity,
                },
                success: function(data) {
                    $('#cart').load(' #cart');
                    Command: toastr["success"](
                        "Thêm thành công");
                },
                error: function() {
                    Command: toastr["warning"]("Lỗi");
                }
            });
        });
    })
</script>
@endsection