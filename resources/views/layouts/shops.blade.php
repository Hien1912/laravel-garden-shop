@include('layouts.shop_partial.css')
<body>
    @include("layouts.shop_partial.header")
    @include("layouts.shop_partial.nav")
    <main class="py-4">
        @yield('content')
    </main>
    <div id="loading" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Title</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Content</p>
                </div>
                <div class="modal-footer">
                    Footer
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="ajax-request" data-backdrop="static" data-keyboard="false">
    </div>
    @include('layouts.shop_partial.footer')
</body>
@include('layouts.shop_partial.js')
