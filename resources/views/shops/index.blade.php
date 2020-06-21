@extends('layouts.shops')
@section('content')
<div class="container">
    <div class="row">
        <div class="d-none d-lg-block col-lg-3" id="side-pane">
            @include('shops.partial.side')
        </div>
        <div class="col-12 col-lg-9" id="list-product">
            <div class="row" id="show-all-product">
                @if($products->count()>0)
                    @include("shops.partial.product")
                @else
                <div class="container">
                    <div class="text-center my-auto h-100">
                        <h1 class="display text-danger h-100 my-auto">
                            Không có sản phẩm được tìm thấy!
                        </h1>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection