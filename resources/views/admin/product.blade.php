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
    @include("admin.product.modal")
    @include("admin.product.details")
</div>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush
@push('js')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="./js/admin/product.js"></script>
@endpush