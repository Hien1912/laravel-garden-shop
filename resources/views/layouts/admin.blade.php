<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}">
    <title>@yield('title', 'Quản lý')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha256-WolrNTZ9lY0QL5f0/Qi1yw3RGnDLig2HVLYkrshm7Y0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" integrity="sha256-VxlXnpkS8UAw3dJnlJj8IjIflIWmDUVQbXD9grYXr98=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/admin/app.css">
    @stack('css')
</head>
<body class="bg-light">
    <header>
        <nav class="navbar navbar-expand-xs navbar-light bg-dark fixed-top" style="height: 55px">
            <button class="navbar-toggler d-none d-lg-block">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button class="navbar-toggler d-block d-lg-none">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ol class="breadcrumb m-0 p-0 bg-dark text-success mx-auto">
            </ol>
            <a href="javascript:App.logout()" class="btn ml-auto btn-outline-light mr-md-5" title="Đăng xuất">
                <i class="fa fa-power-off"></i>
            </a>
        </nav>
        <div class="position-fixed d-none mh-100 d-lg-block border bg-dark" id="side-left" style="left: -1px;width: 240px;min-height: 100vh">
            <ul class="list-group list-group-flush bg-dark mt-5 pt-1">
                <a class="list-group-item list-group-item-action " href="/dashboard">
                    <i class="fa fa-dashboard">&nbsp;&nbsp;&nbsp;&nbsp;</i><span>Dashboard
                        @isset($sidebar['sanpham'])
                        <div class="alert alert-danger">hahahaahaha</div>
                        @endisset
                    </span>
                </a>
                <button class="list-group-item list-group-item-action" href="#san-pham-collapse" data-toggle="collapse">
                    <i class="fa fa-server">&nbsp;&nbsp;&nbsp;&nbsp;</i><span>Sản phẩm</span>
                </button>
                <div id="san-pham-collapse" class="collapse ">
                    <a class="list-group-item list-group-item-action pl-5 " href="/san-pham/cay-canh">
                        <span>Cây cảnh</span>
                    </a>
                    <a class="list-group-item list-group-item-action pl-5 " href="/san-pham/chau-canh">
                        <span>Chậu cảnh</span>
                    </a>
                    <a class="list-group-item list-group-item-action pl-5 " href="/san-pham/phu-kien">
                        <span>Phụ kiện</span>
                    </a>
                    <a class="list-group-item list-group-item-action pl-5 " href="/san-pham/thung-rac">
                        <span>Thùng rác</span>
                    </a>
                </div>
                <button class="list-group-item list-group-item-action" href="#don-hang-collapse" data-toggle="collapse">
                    <i class="fa fa-first-order">&nbsp;&nbsp;&nbsp;&nbsp;</i>Đơn hàng
                </button>
                <div id="don-hang-collapse" class="collapse ">
                    <a class="list-group-item list-group-item-action pl-5 " href="/don-hang/tiep-nhan">
                        <span>Tiếp nhận</span>
                    </a>
                    <a class="list-group-item list-group-item-action pl-5 " href="/don-hang/xac-nhan">
                        <span>Xác nhận</span>
                    </a>
                    <a class="list-group-item list-group-item-action pl-5 " href="/don-hang/dang-gui">
                        <span>Gửi hàng</span>
                    </a>
                    <a class="list-group-item list-group-item-action pl-5 " href="/don-hang/hoan-tat">
                        <span>Hoàn tất</span>
                    </a>
                    <a class="list-group-item list-group-item-action pl-5 " href="/don-hang/huy">
                        <span>Hủy</span>
                    </a>
                </div>
            </ul>
        </div>
    </header>
    <main id="content">
        @yield('content')
    </main>
    <footer></footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha256-56zsTlMwzGRtLC4t51alLh5cKYvi0hnbhEXQTVU/zZQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha256-Xt8pc4G0CdcRvI0nZ2lRpZ4VHng0EoUDMlGcBSQ9HiQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js" integrity="sha256-oOIhv6MPxuIfln8IN7mwct6nrUhs7G1zvImKQxwkL08=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha256-Ka8obxsHNCz6H9hRpl8X4QV3XmhxWyqBpk/EpHYyj9k=" crossorigin="anonymous"></script>
<script src="./js/admin/app.js"></script>
@stack('js')
</html>