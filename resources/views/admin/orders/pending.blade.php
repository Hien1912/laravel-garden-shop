<div class="card">
    <div class="card-header clearfix content-center">
        <h3 class="float-left">Chờ xử lý</h3>
    </div>
    <div class="card-body" id="pot">
        <table class="table table-striped" id="table_pot">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders->where('status', 'pending') as $stt => $order)
                <tr>
                    <td>{{ ++$stt }}</td>
                    <td>{{ ucfirst($order->Address->name) }}</td>
                    <td>
                        <a href="tel:{{ $order->Address->phone }}">{{ $order->Address->phone }}</a>
                    </td>
                    <td class="text-center">
                        <button type="button" data-url="{{ route('order.show', $order) }}" class="btn text-success p-0 m-1 btn-link view_product" onclick="viewOrder(this)">
                            <i class="fa fa-eye"></i>
                        </button>
                        <button type="button" data-id="{{ $order->id }}" class="btn text-warning p-0 m-1 btn-link edit_product" onclick="editorder(this)">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" data-id="{{ $order->id }}" data-btn="pot" class="btn text-danger p-0 m-1 btn-link delete_product" onclick="deleteOrder(this)">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>