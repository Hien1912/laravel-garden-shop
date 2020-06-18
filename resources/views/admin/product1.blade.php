@extends('layouts.admin')
@section('content')
<div class="container-fluid mt-4">
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="/admin/dashboard">HOME</a>
                <span>/</span>
                <span>Sản Phẩm</span>
            </h4>
        </div>
    </div>
    <div class="row wow fadeIn">
        <div class="col mb-4">
            <div class="card">
                <div class="card-header clearfix">
                    <h3 class="float-left">Cây cảnh</h3>
                    <a href="{{ route('product.create') }}" class="float-right btn btn-success rounded-circle btn-lg">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body" id="plant">
                    <table class="table table-striped" id="table_plant">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tên</th>
                                <th class="text-center">Ảnh</th>
                                <th class="text-right">Giá</th>
                                <th class="text-right">Số lượng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Product::where('category_id', '1')->get() as $product)
                            <tr>
                                <td>{{ ucfirst($product->name) }}</td>
                                <td class="text-center">
                                    <img class="img-fluid" src="{{ $product->avatar }}"
                                        style="width:75px; height: 50px">
                                </td>
                                <td class="text-right">
                                    {{ number_format($product->price, 0,'',',') }}
                                </td>
                                <td class="text-right">
                                    {{ $product->amount }}
                                </td>
                                <td class="text-center">
                                    <button type="button" data-id="{{ $product->id }}"
                                        class="btn text-success p-0 m-1 btn-link view_product"
                                        onclick="viewProduct(this)">
                                        <i class="fa fa-eye fa-2x"></i>
                                    </button>
                                    <button type="button" data-id="{{ $product->id }}"
                                        class="btn text-warning p-0 m-1 btn-link edit_product"
                                        onclick="editProduct(this)">
                                        <i class="fa fa-edit fa-2x"></i>
                                    </button>
                                    <button type="button" data-id="{{ $product->id }}" data-btn="plant"
                                        class="btn text-danger p-0 m-1 btn-link delete_product"
                                        onclick="deleteProduct(this)">
                                        <i class="fa fa-trash fa-2x"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row wow fadeIn">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header clearfix content-center">
                    <h3 class="float-left">CHẬU CẢNH</h3>
                    <a href="{{ route('product.create') }}" class="float-right btn btn-success rounded-circle btn-lg">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body" id="pot">
                    <table class="table table-striped" id="table_pot">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tên</th>
                                <th class="text-center">Ảnh</th>
                                <th class="text-right">Giá</th>
                                <th class="text-right">Số lượng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Product::where('category_id', '2')->get() as $product)
                            <tr>
                                <td>{{ ucfirst($product->name) }}</td>
                                <td class="text-center">
                                    <img class="img-fluid" src="{{ $product->avatar }}"
                                        style="width:75px; height: 50px">
                                </td>
                                <td class="text-right">
                                    {{ number_format($product->price, 0,'',',') }}
                                </td>
                                <td class="text-right">
                                    {{ $product->amount }}
                                </td>
                                <td class="text-center">
                                    <button type="button" data-id="{{ $product->id }}"
                                        class="btn text-success p-0 m-1 btn-link view_product"
                                        onclick="viewProduct(this)">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button" data-id="{{ $product->id }}"
                                        class="btn text-warning p-0 m-1 btn-link edit_product"
                                        onclick="editProduct(this)">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-id="{{ $product->id }}" data-btn="pot"
                                        class="btn text-danger p-0 m-1 btn-link delete_product"
                                        onclick="deleteProduct(this)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="card">
                <div class="card-header clearfix">
                    <h3 class="float-left">Phụ kiện</h3>
                    <a href="{{ route('product.create') }}" class="float-right btn btn-success rounded-circle btn-lg">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="card-body" id="accessories">
                    <table class="table table-striped" id="table_accessories">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tên</th>
                                <th class="text-center">Ảnh</th>
                                <th class="text-right">Giá</th>
                                <th class="text-right">Số lượng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Product::where('category_id', '3')->get() as $product)
                            <tr>
                                <td>{{ ucfirst($product->name) }}</td>
                                <td class="text-center">
                                    <img class="img-fluid" src="{{ $product->avatar }}"
                                        style="width:75px; height: 50px">
                                </td>
                                <td class="text-right">
                                    {{ number_format($product->price, 0,'',',') }}
                                </td>
                                <td class="text-right">
                                    {{ $product->amount }}
                                </td>
                                <td class="text-center">
                                    <button type="button" data-id="{{ $product->id }}"
                                        class="btn text-success p-0 m-1 btn-link view_product"
                                        onclick="viewProduct(this)">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button" data-id="{{ $product->id }}"
                                        class="btn text-warning p-0 m-1 btn-link edit_product"
                                        onclick="editProduct(this)">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-id="{{ $product->id }}" data-btn="accessories"
                                        class="btn text-danger p-0 m-1 btn-link delete_product"
                                        onclick="deleteProduct(this)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- view --}}
<div class="modal fade right" id="dashboardview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="false">
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.list-group .active').removeClass('active');
        $('.list-group a.product').addClass('active');
        $('.navbar-nav li.active').removeClass('active');
        $('li.product').addClass('active');
        $('#table_plant').DataTable();
        $('#table_pot').DataTable();
        $('#table_accessories').DataTable();
    });

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

    function editProduct(btn) {
        location.href = '/admin/product/' + $(btn).data('id') + '/edit'
    };

    function deleteProduct(btn) {
        let id = $(btn).data('btn');
        $.ajax({
            url: '/admin/product/' + $(btn).data('id'),
            method: 'delete',
            data: {
                '_token': $('meta[name=token]').attr('content')
            },
            success: function() {
                $(`#${id}`).load(` #table_${id}`);
                setTimeout(function() {
                    $(`#table_${id}`).DataTable();
                }, 1000);
                Command: toastr["success"]("Xóa thành công");
            },
            error: function() {
                Command: toastr["error"](
                    "Xóa không thành công");
            }
        });
    };

    function uploadImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection