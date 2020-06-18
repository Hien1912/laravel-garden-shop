@extends('layouts.admin')
@section('content')
<table class="table table-striped w-100 mx-auto" id="table-product"  class="display" width="100%" style="width: 100%">
</table>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
@endpush
@push('js')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js" integrity="sha256-oOIhv6MPxuIfln8IN7mwct6nrUhs7G1zvImKQxwkL08=" crossorigin="anonymous"></script>
    <script src="./js/admin/product.js"></script>
@endpush
