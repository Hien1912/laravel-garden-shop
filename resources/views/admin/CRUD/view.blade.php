<div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <p class="heading lead">Chi tiết sản phẩm</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&#xD7;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <img id="avatar" src="{{ $product->avatar }}" style="width: 20vw ;height: 20vh">
            </div>
            <div>
                <dl>
                    <dt>
                        Tên sản phẩm
                    </dt>
                    <dd id="name">{{ ucfirst($product->name) }}</dd>
                    <dt>
                        Mô tả
                    </dt>
                    <dd id="description">{!! $product->description !!}</dd>
                    <dt>
                        Giá sản phẩm
                    </dt>
                    <dd id="price">
                        {{ number_format($product->price, 0,'',',') }}
                    </dd>
                    <dt>
                        Số lượng
                    </dt>
                    <dd id="amount">
                        {{ $product->amount }}
                    </dd>
                    <dt>
                        Chi tiết
                    </dt>
                    <dd id="details">
                        {!! $product->details !!}
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>