let Product = {} || Product;


Product.drawTable = function () {
    let uri = location.pathname.split("/")[2];
    $.ajax({
        url: `/ajax/product/${uri}`,
        method: "get",
        success: function (res) {
            console.log("success", res);
        },
        error: function (res) {
            console.log("errors", res);
        }
    });

    $("#table-product").DataTable({
        processing: true,
        ajax: {
            url: `/ajax/product/${uri}`,
            dataSrc: function (res) {
                let i = 0;
                return res.map(Obj => {
                    let tag = [];
                    $.each(Obj.tags, function (i, v) {
                        tag.push(v.name);
                    });
                    tag = tag.join(", ");
                    return {
                        col1: ++i,
                        col2: `<img src="./images/products/${Obj.avatar}" width="70px" height="70px">`,
                        col3: Obj.name,
                        "col4": { sort: `${Obj.price}`, display: new Intl.NumberFormat("vi-VN", { style: 'currency', currency: 'VND' }).format(Obj.price) },
                        col5: Obj.amount,
                        col6: Obj.category.name,
                        col7: tag,
                        col8: `<button type="button" data-id="${Obj.id}">Action</button>`
                    }
                });
            }
        },
        columns: [
            { title: "STT", data: "col1" },
            { title: "Avatar", data: "col2" },
            { title: "Name", data: "col3" },
            {
                title: "Price",
                data: {
                    _: "col4.display",
                    sort: "col4.sort"
                }
            },
            { title: "Amount", data: "col5" },
            { title: "Category", data: "col6" },
            { title: "Tag", data: "col7" },
            { title: "Action", data: "col8" }
        ]
    });
}


Product.init = function () {
    Product.drawTable();
}

$(document).ready(function () {
    Product.init();
});