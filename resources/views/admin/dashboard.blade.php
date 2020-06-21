@extends("layouts.admin")
@section('content')
<section class="py-5">
    <div class="row">
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                        <h6 class="mb-0">Total Product</h6><span class="text-gray">{{ App\Product::count() }}</span>
                    </div>
                </div>
                <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                        <h6 class="mb-0">Total Order</h6><span class="text-gray">{{ App\Order::count() }}</span>
                    </div>
                </div>
                <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-blue"></div>
                    <div class="text">
                        <h6 class="mb-0">Order Pending</h6><span class="text-gray">{{ App\Order::status("pending")->count() }}</span>
                    </div>
                </div>
                <div class="icon text-white bg-blue"><i class="fa fa-dolly-flatbed"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-red"></div>
                    <div class="text">
                        <h6 class="mb-0">Order Finished</h6><span class="text-gray">{{ App\Order::status("finished")->count() }}</span>
                    </div>
                </div>
                <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 text-center bg-primary text-light">
    <h3 class="display-3">Gardern Shop</h3>
    <h3 class="display-3">Welcome Back</h3>
</section>
@endsection
@push('css')
    
@endpush
@push('js')
<script src="./js/admin.js"></script>
@endpush