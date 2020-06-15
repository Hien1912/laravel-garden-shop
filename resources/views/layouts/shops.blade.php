@include('layouts.shop_partial.css')
{{-- <body oncontextmenu="return false"> --}}
<body>
    @include("layouts.shop_partial.header")
    @include("layouts.shop_partial.nav")
    <main class="py-4">
        @yield('content')
    </main>
    @include('layouts.shop_partial.footer')
</body>
@include('layouts.shop_partial.js')
