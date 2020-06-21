<header class="container-fluid sticky-top bg-light">
    <div class="container-lg">
        <div id="hotline" class="d-inline-block">
            <span class="fa fa-phone">&nbsp;</span>
            <span class="d-none d-md-inline"> Hotline:&nbsp;</span>
            <a class="text-decoration-none" href="tel:+0987654321">0987654321</a>
        </div>
        <div class="ml-auto">
            <a href="/shopping-cart" class="nav-link d-block shopping-cart" class="btn">
                <span class="d-md-inline d-none text-primary">Giỏ Hàng</span>
                <span id="shopping-cart">({{ Cart::getTotalQuantity() }})</span>
            </a>
        </div>
    </div>
</header>
<div id="brand" class="container my-md-2 text-center text-md-left my-lg-auto my-4">
    <div class="row align-items-center justify-content-between">
        <div id="logo-brand" class="col-12 col-md-6">
            <a class="brand" href="/">
                <img id="logo-brand-img" src="./brand.png" alt="logo">
            </a>
        </div>
        <div>
        </div>
        <form method="GET" action="/"  class="col-12 col-md-6 w-100 text-center text-lg-right" id="form-search">
            <div class="btn-group w-75">
                <input type="text" name="search" class="pl-4 w-100" placeholder="Search...">
                <button type="submit" class="btn bg-light border-left text-info">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>