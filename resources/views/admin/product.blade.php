@extends('layouts.admin')
@section('content')
<div class="container py-5">
    <ul class="nav nav-pills mb-5 justify-content-between d-flex" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active btn btn-outline-primary" data-toggle="pill" href="#pills-primary-table" role="tab" aria-controls="pills-home" aria-selected="true">Table</a>
        </li>
        <li class="nav-item">
            <button class="nav-link btn btn-success" onclick="Product.create()">Create</button>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-outline-dark" data-toggle="pill" href="#pills-trash-table" role="tab" aria-controls="pills-primary-table" aria-selected="false">Trash</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-primary-table" role="tabpanel" aria-labelledby="pills-primary-table-tab">
            <table id="primary-table" class="table table-striped table-bordered shadow-lg" width="100%">
                <thead class="thead-dark" width="100%">
                    <tr>
                        <th>#</th>
                        <th style="min-width: 100px">Avatar</th>
                        <th>Name</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Amount</th>
                        <th>Tag</th>
                        <th style="min-width: 120px">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tab-pane fade" id="pills-trash-table" role="tabpanel" aria-labelledby="pills-trash-table-tab">
            <table id="trash-table" class="table table-striped table-bordered shadow-lg" width="100%">
                <thead class="thead-dark" width="100%">
                    <tr>
                        <th>#</th>
                        <th style="min-width: 100px">Avatar</th>
                        <th>Name</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Amount</th>
                        <th>Tag</th>
                        <th style="min-width: 120px">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="product-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 id="product-modal-header">Create Product</h3>
                </div>
                <div class="modal-body">
                    <form id="form-edit" action="javascript:Product.save()" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body" id="product_edit">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-6 content-center">
                                        <p>Avatar</p>
                                        <img src="" id="show-img" class="img-fluid border"
                                            alt="Click to upload file" onclick="avatar.click()"
                                            style="min-width: 20vw; min-height: 15vw; width: 20vw; height: 15vw">
                                        <input type="file" name="avatar" accept="image/*" class="d-none"
                                            onchange="Product.showImg(this)">
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" required
                                                value="">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Price</label>
                                                <input class="form-control" type="number" min="1000" name="price" required
                                                    value="">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Amount</label>
                                                <input class="form-control" type="number" min="1" name="amount" required
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-group w-100">
                                            <label>Category</label>
                                            <select class="form-control" name="category_id">
                                                @foreach (App\Category::all() as $item)
                                                <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tag</label>
                                            <select class="form-control" name="tag_id[]" multiple>
                                                @foreach (App\Tag::all() as $item)
                                                <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea class="form-control" id="details" name="details"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" id="submit-form">Save
                                <i class="fa fa-save ml-1"></i>
                            </button>
                            <button type="button" role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-details" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row product-details justify-content-center">
                            <div class="col-12 col-md-6">
                                <img id="view-avatar" src="" width="150px" height="150px">
                            </div>
                            <div class="col-12 col-md-6 pl-5 pt-md-0 pt-5">
                                <div class="row product-name">
                                    <p>Name:</p>
                                    <span id="view-name"></span>
                                </div>
                                <div class="product-description">
                                    <p>Description:</p>
                                    <div id="view-description">
                    
                                    </div>
                                </div>
                                <div class="product-price">
                                    <span>Price: <i id="view-price"></i></span>
                                </div>
                                <div class="product-amount pl-2">
                                    <span>Amount: <i id="view-amount"></i></span>
                                </div>
                                <div class="product-amount pl-2">
                                    <span>Category: <i id="view-category"></i></span>
                                </div>
                                <div class="product-amount pl-2">
                                    <span>Tags: <i id="view-tag"></i></span>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="container border-top mt-5 pt-3">
                        <h3>Details:</h3>
                        <div id="view-details">
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" /> --}}
@endpush
@push('js')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js" integrity="sha256-oOIhv6MPxuIfln8IN7mwct6nrUhs7G1zvImKQxwkL08=" crossorigin="anonymous"></script> --}}
    <script src="./js/admin/product.js"></script>
@endpush