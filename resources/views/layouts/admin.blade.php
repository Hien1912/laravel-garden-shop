<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}">
    <title>@yield('title', 'Quản lý')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
    <link rel="stylesheet" href="{{ asset("admin/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("admin/css/mdb.min.css") }}">
    <link rel="stylesheet" href="{{ asset("admin/css/style.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="{{ asset("admin/js/jquery.min.js") }}"></script>
    <script src="{{ asset("admin/js/popper.min.js") }}"></script>
    <script src="{{ asset("admin/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("admin/js/mdb.min.js") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
    <div class="container-for-admin">
        <header>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
                <div class="container-fluid">
                    <a class="navbar-brand waves-effect" href="/">
                        <strong class="blue-text">DGarden</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link waves-effect" href="/admin/dashboard">Dashboard
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item home">
                                <a class="nav-link waves-effect" href="#">HOME
                                </a>
                            </li>
                            <li class="nav-item product">
                                <a class="nav-link waves-effect" href="/admin/product">SẢN PHẨM</a>
                            </li>
                            <li class="nav-item order">
                                <a class="nav-link waves-effect" href="/admin/order">ĐƠN HÀNG</a>
                            </li>
                            </li>
                            <li class="nav-item other">
                                <a class="nav-link waves-effect" href="/admin/other">KHÁC</a>
                            </li>
                        </ul>

                        <!-- Right -->
                        <ul class="navbar-nav nav-flex-icons ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="sidebar-fixed position-fixed">
                <a class="logo-wrapper waves-effect">
                    <img src="{{ asset('brand.png') }}" class="img-fluid" alt>
                </a>
                <div class="list-group list-group-flush">
                    <a href="/admin/dashboard"
                        class="list-group-item list-group-item-action waves-effect active dashboard">
                        <i class="fas fa-dashboard mr-3"></i>Dashboard
                    </a>
                    <a href="/admin/product" class="list-group-item list-group-item-action waves-effect product">
                        <i class="fa fa-table mr-3"></i>SẢN PHẨM</a>
                    <a href="/admin/order" class="list-group-item list-group-item-action waves-effect order">
                        <i class="fa fa-cart-arrow-down mr-3"></i>ĐƠN HÀNG</a>
                    <a href="/admin/other" class="list-group-item list-group-item-action waves-effect other">
                        <i class="fa fa-money mr-3"></i>OTHERS</a>
                </div>
            </div>
        </header>
        <main class="pt-5 mx-lg-5">
            @yield('content')
        </main>
        <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">
            <div class="footer-copyright py-3">&#xA9; {{ date('Y') }} Copyright:
                <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"></a>
            </div>
        </footer>
    </div>
</body>
</html>
