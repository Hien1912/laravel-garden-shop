<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <link rel="stylesheet" href="./shops/assets/css/styles.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="./shops/assets/js/script.min.js"></script>
    <title>@yield('title', 'Trang chủ')</title>
</head>
<body>
    <header class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg container">
            <a class="navbar-brand logo" href="/">
                <img class="img-logo" src="./brand.png" alt="logo" style="">
            </a>
            <div class="toast text-success bg-light mx-auto w-auto fixed-top" data-autohide="true" data-delay="2000">
            </div>
            <ul class="nav navbar-nav ml-auto cart">
                <li class="nav-item text-primary btn dropdown dropleft" id="cart" onmousemove="showCart()" onmouseout="closeCart()">
                    <a href="/gio-hang" class="btn btn-link dropdown-toggle-split">
                        <span class="material-icons">shopping_cart</span>
                        <sub>
                            {{ Cart::getTotalQuantity() }}
                        </sub>
                    </a>
                    <div class="dropdown-menu p-0" id="cart-hover" onmouseout="closeCart()">
                        <table class="table dropdown-item">
                            <thead class="thead-inverse">
                                <th>Tên sản phẩm</th>
                                <th class="text-left">Số lượng</th>
                                <th>Tổng tiền</th>
                            </thead>
                            <tbody>
                                @foreach (Cart::getContent() as $product)
                                <tr>
                                    <td>
                                        {{ ucfirst($product->name) }}
                                    </td>
                                    <td class="text-right">
                                        x{{ $product->quantity }}
                                    </td>
                                    <td class="text-right">
                                        @money($product->quantity * $product->price, 'VND')
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-secondary">
                                <th>Tổng</th>
                                <th class="text-right">{{ Cart::getTotalQuantity() }}</th>
                                <th class="text-right">
                                    @money(Cart::getTotal(), 'VND')
                                </th>
                            </tfoot>
                        </table>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container-fluid bg-success mb-4">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg bg-success clean-navbar">
                <div class="container">
                    <button data-toggle="collapse" data-target="#nav1" class="navbar-toggler ml-auto">
                        <span class="material-icons">
                            reorder
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="nav1">
                        <ul class="nav navbar-nav mx-auto bg-success">
                            <li class="nav-item">
                                <a href="/about" class="bg-success btn btn-link text-light text-decoration-none">
                                    Giới thiệu
                                </a>
                            </li>
                            @foreach(App\Category::all() as $item)
                                <li class="nav-item bg-success">
                                    <div class="btn-group mx-1">
                                        <a href="/?category={{ $item->id }}" class="btn btn-primary bg-success pr-1 border-0">{{ ucfirst($item->name) }}
                                        </a>
                                        <button type="button" class="btn btn-success pl-1 dropdown-toggle">
                                        </button>
                                        <div class="dropdown-menu bg-success dropdown-menu-left">
                                            @foreach($item->tags as $tag)
                                                <a class="dropdown-item active bg-success" href="/?tag={{ $tag->id }}">{{ ucfirst($tag->name)}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <a href="/contact" class="bg-success btn btn-link text-light text-decoration-none">
                                    Liên hệ
                                </a>
                            </li>
                        </ul>
                        <nav class="nav">
                            <li class="nav-item">
                                <form method="GET" action="/" class="row ml-auto">
                                    <input class="form-control col input-search" type="text" name="search" placeholder="Search...">
                                    <button type="submit" class="btn btn-info btn-submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <main>
        @yield('content')
    </main>
    <footer class="page-footer bg-dark text-light mt-5">
        <div class="footer-copyright text-center text-light" style="background-color: black;">
            <p class="mb-0">©{{ date('Y') }} Copyright Text</p>
        </div>
    </footer>
</body>
<script>

    $(document).ready(function () {
        $('.btn-group, .dropdown-menu').hover(function () {
            let btn = $(this).parent();
            $('.dropdown-menu').removeClass('show');
            $(btn).find('.dropdown-menu').addClass('show');
        });

        $('.btn-group, .dropdown-menu').mouseleave(function () {
            $('.dropdown-menu').removeClass('show');
        });

        $(".pagination a").click(function () {
            $('html, body').animate({
                scrollTop: $("body").offset().top
            }, 2000);
        });
    });

    function showCart(){
        $("#cart-hover").addClass('show');
    }

    function closeCart(){
        $("#cart-hover").removeClass('show');
    }

</script>

</html>
