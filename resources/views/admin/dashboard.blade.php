@extends('layouts.admin')
@section('content')
@if($sidebar['dashboard']) 
    <div class="alert alert-danger">hahahaahaha</div>
@endif
{{-- <div class="container-fluid mt-5">
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="/">HOME</a>
                <span>/</span>
                <span>Dashboard</span>
            </h4>
        </div>
    </div>
    <div class="row wow fadeIn">
        <div class="col-md-9 mb-4">
            <div class="card">
                <div class="card-header">
                    <h4>Sản phẩm mới</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Product::orderBy('created_at', 'desc')->take(10)->get() as $no =>
                            $product)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ ucfirst($product->name) }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ $product->avatar }}"
                                        style="width:75px; height: 50px">
                                </td>
                                <td>
                                    {{ number_format($product->price, 0,'',',') }}
                                </td>
                                <td>
                                    {{ $product->amount }}
                                </td>
                                <td>
                                    <button type="button" data-id="{{ $product->id }}"
                                        class="btn text-success p-0 m-0 btn-link viewproduct"
                                        onclick="viewProduct(this)">
                                        <i class="fa fa-eye fa-2x"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="list-group list-group-flush border-primary border">
                        <a class="list-group-item list-group-item-action waves-effect">SẢN PHẨM
                            <span class="badge badge-primary badge-pill pull-right">
                                {{ App\Product::count() }}
                            </span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Cây cảnh
                            <span class="badge badge-primary badge-pill pull-right">
                                {{ App\Product::where('category_id', 1)->count() }}
                            </span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Chậu cảnh
                            <span class="badge badge-primary badge-pill pull-right">
                                {{ App\Product::where('category_id', 2)->count() }}
                            </span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Phụ kiện
                            <span class="badge badge-primary badge-pill pull-right">
                                {{ App\Product::where('category_id', 3)->count() }}
                            </span>
                        </a>
                    </div>
                    <div class="list-group list-group-flush border border-danger">
                        <a class="list-group-item list-group-item-action waves-effect">ĐƠN HÀNG
                            <span class="badge badge-danger badge-pill pull-right">
                                {{ App\Order::count() }}
                            </span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Tiếp nhận
                            <span class="badge badge-danger badge-pill pull-right">
                                {{ App\Order::where('status', 'pending')->count() }}
                            </span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Xác nhận
                            <span class="badge badge-danger badge-pill pull-right">
                                {{ App\Order::where('status', 'verified')->count() }}
                            </span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Hủy
                            <span class="badge badge-danger badge-pill pull-right">
                                {{ App\Order::where('status', 'cancelled')->count() }}
                            </span>
                        </a>
                        <a class="list-group-item list-group-item-action waves-effect">Thành công
                            <span class="badge badge-danger badge-pill pull-right">
                                {{ App\Order::where('status', 'shipped')->count() }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade right" id="dashboardview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="false">
</div>
<script>
    $(document).ready(function() {});

    function viewProduct(btn) {
        let id = $(btn).data('id');
        $.ajax({
            url: '/admin/product/' + id,
            method: 'get',
            success: function(data) {
                $('#dashboardview').html(data);
                $('#dashboardview').modal('show');
            }
        });
    }
</script> --}}
@endsection