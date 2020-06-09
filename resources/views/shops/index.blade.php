@extends('layouts.shops')
@section('content')
<style>
    .img-product {
        width: 20vh;
        height: 15vh;
    }

    .img-product:hover {
        opacity: 0.5;
    }
</style>
<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="d-none d-md-block">
                            <div class="filters">
                                @foreach($category as $item)
                                <div class="filter-item">
                                    <h3>{{ ucfirst($item->name) }}</h3>
                                    @foreach($item->tags as $tag)
                                    <div class="pl-3">
                                        <a href="/?tag={{ $tag->id }}"
                                            class="btn btn-link text-decoration-none p-0">{{ ucfirst($tag->name) }}</a>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9" id="top">
                        <h3>Danh sách sản phẩm</h3>
                        <div class="row" id="list-product">
                            @include('shops.list')
                        </div>
                    </div>
                    <div>
                        <a href="#top" class="btn btn-warning position-fixed">Top</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    // $(document).ready(function () {


    // });

    function addToCart (id, name) {
            $.ajax({
                url: '/cart',
                method: 'post',
                data: {
                    '_token': $('meta[name=token]').attr('content'),
                    'id': id,
                    'qty': 1,
                },
                success: function (data) {
                    $('.cart').load(' #cart');
                    $('.toast').html(`Thêm ${name} thành công`);
                    $('.toast').toast('show');
                    $('.cart').load(' #cart');
                },
                error: function () {
                    $('.toast').html(`Thêm ${name} không thành công`);
                    $('.toast').toast('show');
                }
            });
        }

    // function paginate(btn) {
	// 		let page = btn.href.split("?page=")[1];
	// 		let get = location.href.split('/?')[1];
    //         if (get) {
    //             $.get(`/paginate/?${get}&page=${page}`).done(function(data){
    //                 console.log(data);
    //                 $('.pagination').remove();
    //                 $('#list-product').append(data);
    //             });
    //         }
    //         else{
    //             $.get(`/paginate/?page=${page}`).done(function(data){
    //                 console.log(data);
    //                 $('.pagination').remove();
    //                 $('#list-product').append(data);
    //             });
    //         }
    //     }

</script>
@endsection