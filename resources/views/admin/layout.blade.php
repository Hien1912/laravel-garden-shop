<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}">
	<title>Admin Dashboard</title>
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha256-WolrNTZ9lY0QL5f0/Qi1yw3RGnDLig2HVLYkrshm7Y0=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" integrity="sha256-VxlXnpkS8UAw3dJnlJj8IjIflIWmDUVQbXD9grYXr98=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
	<link rel="stylesheet" href="./css/admin/orionicons.css">
	<link rel="stylesheet" href="./css/admin/app.css">
	@stack('css')
</head>
<body>
	<header class="header">
		<nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
			<a href="javascript:void(0);" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
				<i class="fas fa-align-left"></i>
			</a>
			<a href="/dashboard" class="navbar-brand font-weight-bold text-uppercase text-base">Admin Dashboard</a>
			<ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
				<li class="nav-item dropdown ml-auto">
					<a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
						<img src="./img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow">
					</a>
					<div aria-labelledby="userInfo" class="dropdown-menu">
						<a href="javascript:void(0)" class="dropdown-item">
							<strong class="d-block text-uppercase headings-font-family">{{ Auth::user()->name }}</strong>
							<small>{{ Auth::user()->email }}</small>
						</a>
						{{-- <a href="{{ route("logout") }}" class="dropdown-item">Logout</a> --}}
					</div>
				</li>
			</ul>
		</nav>
	</header>
	<div class="d-flex align-items-stretch">
		<div id="sidebar" class="sidebar py-3">
			<div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
			<ul class="sidebar-menu list-unstyled">
				<li class="sidebar-list-item">
					<a href="{{ route("dashboard") }}" class="sidebar-link text-muted @if(count($sidebar)<2) active @endif">
						<i class="o-home-1 mr-3 text-gray"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="sidebar-list-item">
					<a href="#product-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="product-collapse" class="sidebar-link text-muted">
						<i class="o-database-1 mr-3 text-gray"></i>
						<span>Products</span>
					</a>
					<div id="product-collapse" class="collapse show">
						<ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
							<li class="sidebar-list-item">
								<a href="{{ route("product.bonsai") }}" class="sidebar-link text-muted pl-lg-5">Bonsai</a>
							</li>
							<li class="sidebar-list-item">
								<a href="{{ route("product.pots") }}" class="sidebar-link text-muted pl-lg-5">Pots</a>
							</li>
							<li class="sidebar-list-item">
								<a href="{{ route("product.accessories") }}" class="sidebar-link text-muted pl-lg-5">Accessories</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="sidebar-list-item">
					<a href="#order-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="order-collapse" class="sidebar-link text-muted">
						<i class="o-paperwork-1 mr-3 text-gray"></i>
						<span>Orders</span>
					</a>
					<div id="order-collapse" class="collapse">
						<ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
							<li class="sidebar-list-item">
								<a href="{{ route("order.pending") }}" class="sidebar-link text-muted pl-lg-5">Pending</a>
							</li>
							<li class="sidebar-list-item">
								<a href="{{ route("order.verified") }}" class="sidebar-link text-muted pl-lg-5">Verified</a>
							</li>
							<li class="sidebar-list-item">
								<a href="{{ route("order.delivery") }}" class="sidebar-link text-muted pl-lg-5">Delivery</a>
							</li>
							<li class="sidebar-list-item">
								<a href="{{ route("order.finished") }}" class="sidebar-link text-muted pl-lg-5">Finished</a>
							</li>
							<li class="sidebar-list-item">
								<a href="{{ route("order.cancelled") }}" class="sidebar-link text-muted pl-lg-5">Cancelled</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
			<div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
			<ul class="sidebar-menu list-unstyled">
				<li class="sidebar-list-item">
					<a href="javascript:void(0)" class="sidebar-link text-muted" onclick="$('#logout').submit()">
						<form action="{{ route("logout") }}" id="logout" method="post">
							@csrf
						<i class="o-exit-1 mr-3 text-gray"></i>
						<span onclick="this.form-submit()">Logout</span>
						</form>
					</a>
				</li>
			</ul>
		</div>
		<div class="page-holder w-100 d-flex flex-wrap">
			<div class="container-fluid px-xl-5">
				@yield('content')
			</div>
			<footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 text-center text-md-left text-primary">
							<p class="mb-2 mb-md-0">&copy; {{ date("Y") }} by GardenShop</p>
						</div>
						<div class="col-md-6 text-center text-md-right text-gray-400">
							<p class="mb-0">Design by <a href="/" class="external text-gray-400">GardenShop</a></p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha256-56zsTlMwzGRtLC4t51alLh5cKYvi0hnbhEXQTVU/zZQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha256-Xt8pc4G0CdcRvI0nZ2lRpZ4VHng0EoUDMlGcBSQ9HiQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha256-Ka8obxsHNCz6H9hRpl8X4QV3XmhxWyqBpk/EpHYyj9k=" crossorigin="anonymous"></script>
<script src="./js/admin/app.js"></script>
@stack('js')
</html>