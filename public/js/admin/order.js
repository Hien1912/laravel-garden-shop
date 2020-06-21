let Order = {} || Order;

Order.table;
Order.tableDetails;

Order.drawTable = () => {
    let uri = location.pathname;
    Order.table = $("#order-table").DataTable({
        processing: true,
        ajax: {
            url: `/admin${uri}`,
            dataSrc: function (res) {
                return res.map(v => {
                    return {
                        col1: v.id,
                        col2: v.name,
                        col3: v.email,
                        col4: v.phone,
                        col5: `${v.address}, ${v.city}`,
                        col6: `
                        <select id="status-${v.id}" class="form-control mb-2">
                            <option value="pending" ${v.status == "pending" ? "selected" : ""}>Pending</option>
                            <option value="verified" ${v.status == "verified" ? "selected" : ""}>Verified</option>
                            <option value="delivery" ${v.status == "delivery" ? "selected" : ""}>Delivery</option>
                            <option value="finished" ${v.status == "finished" ? "selected" : ""}>Finished</option>
                            <option value="cancelled" ${v.status == "cancelled" ? "selected" : ""}>Cancelled</option>
                        </select>
                        <button class="btn btn-primary mx-auto" onclick=Order.update(${v.id})>Update</button>
                        `,
                        col7: `
                            <button class="btn btn-info btn-action" title="Details" onclick="Order.details(${v.id})">
                                <span class="fas fa-eye"></span>
                            </button>
                        `
                    }
                });
            }
        },
        columns: [
            { data: "col1" },
            { data: "col2" },
            { data: "col3" },
            { data: "col4" },
            { data: "col5" },
            { data: "col6" },
            { data: "col7" }
        ]
    });
}

Order.html;
Order.modal = () => {
    Order.html = $('#modal-details .modal-body').html();
};

Order.details = id => {
    $('#modal-details .modal-body').html(Order.html);

    if (Order.tableDetails) {
        Order.tableDetails.clear();
    }

    Order.tableDetails = $("#order-details").DataTable({
        processing: true,
        paging: false,
        orderable: false,
        ajax: {
            url: `/admin/order/get-${id}`,
            dataSrc: function (res) {
                let no = 0;
                $("#total-quantity").html(res.total_quantity);
                $("#total-price").html(new Intl.NumberFormat("vi-VN", { style: 'currency', currency: 'VND' }).format(res.total_price));
                return res.products.map(v => {
                    return {
                        col1: ++no,
                        col2: `<img src="./images/products/${v.avatar}" width="60px" height="60px">`,
                        col3: v.name,
                        col4: new Intl.NumberFormat("vi-VN", { style: 'currency', currency: 'VND' }).format(v.pivot.price),
                        col5: v.pivot.quantity,
                        col6: new Intl.NumberFormat("vi-VN", { style: 'currency', currency: 'VND' }).format(v.pivot.price * v.pivot.quantity)
                    }
                });

            }
        },
        columns: [
            { data: "col1" },
            { data: "col2" },
            { data: "col3" },
            { data: "col4" },
            { data: "col5" },
            { data: "col6" }
        ], initComplete: () => {
            $('#modal-details').modal('show');
        }
    });

}

Order.update = (id) => {
    let status = $(`#status-${id}`).val();
    $.ajax({
        url: `/admin/order/update-${id}`,
        method: "put",
        data: { status: status },
        success: res => {
            Order.table.ajax.reload(false, null);
        }, error: res => {
            alert(res);
        }
    });
}

Order.init = () => {
    Order.drawTable();
    Order.modal();
}

$(document).ready(() => {
    Order.init();
});