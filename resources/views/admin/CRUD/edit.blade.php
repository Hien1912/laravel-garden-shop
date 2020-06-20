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
                <span>CHỈNH SỬA</span>
            </h4>
        </div>
    </div>
    <div class="row wow fadeIn">
        <div class="col mb-4">
            <div class="modal-header">
                <p class="heading lead">Chỉnh sửa sản phẩm</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close1">
                    <span aria-hidden="true" class="white-text">&#xD7;</span>
                </button>
            </div>
            <form action="{{ route('product.update', $product) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <input type="hidden" name="id" value="{{ $product->id }}">
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
                                <input type="hidden" name="avatar" id="avatar" value="{{ asset($product->avatar) }}">
                                <input type="file" name="avatarcheck" accept="image/*" class="d-none" onchange="uploadImg(this)">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>name</label>
                                    @error('avatarcheck')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input class="form-control" type="text" name="name" required
                                        value="{{ $product->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    @error('description')
                                        <div class="alert alert-warning" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <textarea class="form-control" name="description" required
                                        onclick="CKEDITOR.replace(this)">{!! $product->description !!}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Price</label>
                                        @error('price')
                                            <div class="alert alert-warning" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input class="form-control" type="number" min="1000" name="price" required
                                            value="{{ $product->price }}">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Amount</label>
                                        @error('amount')
                                            <div class="alert alert-warning" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input class="form-control" type="number" min="1" name="amount" required
                                            value="{{ $product->amount }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Category</label>
                                        @error('category_id')
                                            <div class="alert alert-warning" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <select class="form-control" name="category_id">
                                            @foreach(App\Category::all() as $item)
                                                <option value="{{ $item->id }}" @if($item->id ==
                                                    $product->category_id) selecte @endif>
                                                    {{ ucfirst($item->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <textarea class="form-control" name="details" required
                                onclick="CKEDITOR.replace(this)">{!! $product->details !!}</textarea>
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
    $(document).ready(function () {
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
            reader.onload = function (e) {
                $('#preview_img').attr('src', e.target.result);
                $('#avatar').val(e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection
