<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha256-WolrNTZ9lY0QL5f0/Qi1yw3RGnDLig2HVLYkrshm7Y0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" integrity="sha256-VxlXnpkS8UAw3dJnlJj8IjIflIWmDUVQbXD9grYXr98=" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/admin/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" integrity="sha256-JHGEmB629pipTkMag9aMaw32I8zle24p3FpsEeI6oZU=" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/admin/style3.css">
    @stack('css')
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar" class="bg-dark">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>
            <div class="sidebar-header bg-dark">
                <h3 class="text-center">@auth {{ Auth::user()->name }} @endauth</h3>
            </div>
            <ul class="list-unstyled components">
                <p class="text-center">Garden Shop</p>
                <li class="@if(in_array("Dashboard", $sidebar)) active @endif">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="@if(in_array("Sản Phẩm", $sidebar)) active @endif">
                    <a href="#ProductSubmenu" data-toggle="collapse" aria-expanded="false">Sản Phẩm</a>
                    <ul class="collapse list-unstyled @if(in_array("Sản Phẩm", $sidebar)) show @endif" id="ProductSubmenu">
                        <li class="@if(in_array("Cây cảnh", $sidebar)) active @endif">
                            <a href="/san-pham/cay-canh">Cây cảnh</a>
                        </li>
                        <li class="@if(in_array("Chậu cảnh", $sidebar)) active @endif">
                            <a href="/san-pham/chau-canh">Chậu cảnh</a>
                        </li>
                        <li class="@if(in_array("Phụ kiện", $sidebar)) active @endif">
                            <a href="/san-pham/phu-kien">Phụ kiện</a>
                        </li>
                        <li class="@if(in_array("Rác", $sidebar)) active @endif">
                            <a href="/san-pham/thung-rac">Rác</a>
                        </li>
                    </ul>
                </li>
                <li class="@if(in_array("Đơn hàng", $sidebar)) active @endif">
                    <a href="#OrderSubmenu" data-toggle="collapse" aria-expanded="false">Đơn hàng</a>
                    <ul class="collapse list-unstyled @if(in_array("Đơn hàng", $sidebar)) show @endif" id="OrderSubmenu">
                        <li class="@if(in_array("Tiếp nhận", $sidebar)) active @endif">
                            <a href="/don-hang/tiep-nhan">Tiếp nhận</a>
                        </li>
                        <li class="@if(in_array("Xác nhận", $sidebar)) active @endif">
                            <a href="/don-hang/xac-nhan">Xác nhận</a>
                        </li>
                        <li class="@if(in_array("Đang gửi", $sidebar)) active @endif">
                            <a href="/don-hang/dang-gui">Đang gửi</a>
                        </li>
                        <li class="@if(in_array("Hoàn tất", $sidebar)) active @endif">
                            <a href="/don-hang/hoan-tat">Hoàn tất</a>
                        </li>
                        <li class="@if(in_array("Đơn Hủy", $sidebar)) active @endif">
                            <a href="/don-hang/huy">Đơn Hủy</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li class="">
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li class="">
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span class="d-none d-sm-inline-block">Toggle Sidebar</span>
                    </button>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item @if(count($sidebar) < 2) active @endif">{{ $sidebar[0] }}</li>
                        @if(count($sidebar) > 1 )
                        <li class="breadcrumb-item active">{{ $sidebar[1] }}</li>
                        @endif
                    </ol>
                </div>
            </nav>
            <div>
                @yield('content')
            </div>
        </div>
    </div>

    <div class="overlay"></div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha256-56zsTlMwzGRtLC4t51alLh5cKYvi0hnbhEXQTVU/zZQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha256-Xt8pc4G0CdcRvI0nZ2lRpZ4VHng0EoUDMlGcBSQ9HiQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha256-Ka8obxsHNCz6H9hRpl8X4QV3XmhxWyqBpk/EpHYyj9k=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js" integrity="sha256-AKEjDiK2rz+d8TSPLNVNydvgJvOkG5veMAnc79FkiuE=" crossorigin="anonymous"></script>
<script src="./js/admin/app.js"></script>
@stack('js')
</html>