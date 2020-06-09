@extends('layouts.admin')
@section('content')
<div class="container-fluid mt-4">
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="/admin/dashboard">HOME</a>
                <span>/</span>
                <a href="/admin/product">SẢN PHẨM</a>
                <span>/</span>
                <span>THÊM</span>
            </h4>
        </div>
    </div>
    <div class="row wow fadeIn">
        <div class="col mb-4">
            <div class="modal-header">
                <p class="heading lead">Thêm sản phẩm</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close1">
                    <span aria-hidden="true" class="white-text">&#xD7;</span>
                </button>
            </div>
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body" id="product_edit">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-6 content-center">
                                <p>Avatar</p>
                                @error('avatarcheck')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                <img src="{{ asset($product->avatar) }}" id="preview_img" class="img-fluid border"
                                    alt="Click to upload file" onclick="avatarcheck.click()"
                                    style="min-width: 20vw; min-height: 15vw; width: 20vw; height: 15vw">
                                    <input type="hidden" name="avatar" id="avatar" value="{{ old('avatar') }}">
                                <input type="file" name="avatarcheck" accept="image/*" class="d-none"
                                    onchange="uploadImg(this)">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    @error('name')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <input class="form-control" type="text" name="name" required
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    @error('description')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <textarea class="form-control" name="description">{!! old('description') !!}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Price</label>
                                        <input class="form-control" type="number" min="1000" name="price" required
                                            value="{{ old('price') ?? 10000}}">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Amount</label>
                                        <input class="form-control" type="number" min="1" name="amount" required
                                            value="{{ old('amount') ?? 100}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach (App\Category::all() as $item)
                                            <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('price')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @error('amount')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @error('category_id')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            @error('details')
                            <div class="alert alert-warning" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <textarea class="form-control" name="details">{!! old('details') !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Lưu
                        <i class="fa fa-save ml-1"></i>
                    </button>
                    <button role="button" class="btn btn-outline-success waves-effect"
                        onclick="confirm('Xác nhận hủy') ? document.getElementById('close1').click(): ''">
                        Hủy
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.list-group .active').removeClass('active');
        $('.list-group a.product').addClass('active');
        $('.navbar-nav li.active').removeClass('active');
        $('li.product').addClass('active');
        CKEDITOR.replace('description');
        CKEDITOR.replace('details');
    });
    function uploadImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_img').attr('src', e.target.result);
                $('#avatar').val(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection