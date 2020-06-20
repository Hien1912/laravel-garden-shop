@extends('layouts.admin')
@section('content')
<div class="container-fluid mt-4">
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="/admin/dashboard">HOME</a>
                <span>/</span>
                <span>ĐƠN HÀNG</span>
            </h4>
        </div>
    </div>
    <div class="row wow fadeIn">
        <div class="col-md-6">
            @include('admin.orders.pending')
        </div>
        <div class="col-md-6 p-0">
            @include('admin.orders.verified')
        </div>
    </div>
    <div class="row wow fadeIn mt-4">
        <div class="col-md-6">
            @include('admin.orders.cancelled')
        </div>
        <div class="col-md-6 p-0">
            @include('admin.orders.shipped')
        </div>
    </div>
</div>
{{-- view --}}
<div class="modal fade right" id="orderview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="false">
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.list-group .active').removeClass('active');
        $('.list-group a.order').addClass('active');
        $('.navbar-nav li.active').removeClass('active');
        $('li.order').addClass('active');
        // $('#table_plant').DataTable();
        // $('#table_pot').DataTable();
        // $('#table_accessories').DataTable();
    });

    function viewOrder(btn)
    {
        location.href = $(btn).data('url');
    }
</script>
@endsection