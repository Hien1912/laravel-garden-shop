let Product = {} || Product;

Product.table;
Product.tableTrash;

Product.drawTable = function () {
    let uri = location.pathname;
    Product.table = $("#primary-table").DataTable({
        processing: true,
        ajax: {
            url: `/admin${uri}`,
            dataSrc: function (res) {
                let no = 0;
                return res.map(v => {
                    let tag = [];
                    $.each(v.tags, (i, v) => {
                        tag.push(`<span class="badge badge-secondary">${v.name}</span>`);
                    });

                    return {
                        col1: ++no,
                        col2: `<img src="./images/products/${v.avatar}" width="60px" height="60px">`,
                        col3: v.name,
                        col4: new Intl.NumberFormat("vi-VN", { style: 'currency', currency: 'VND' }).format(v.price),
                        col5: v.amount,
                        col6: tag.join(" "),
                        col7: `
                            <button class="btn btn-info btn-action" title="Details" onclick="Product.details(${v.id})">
                                <span class="fas fa-eye"></span>
                            </button>
                            <button class="btn btn-warning btn-action" title="Edit" onclick="Product.edit(${v.id})">
                                <span class="fas fa-edit"></span>
                            </button>
                            <button class="btn btn-danger btn-action" title="Move Trash" onclick="Product.remove(${v.id})">
                                <span class="fas fa-trash"></span>
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

Product.drawTableTrash = function () {
    Product.tableTrash = $("#trash-table").DataTable({
        processing: true,
        ajax: {
            url: `/admin/product/trash`,
            dataSrc: function (res) {
                let no = 0;
                return res.map(v => {
                    let tag = [];
                    $.each(v.tags, (i, v) => {
                        tag.push(`<span class="badge badge-secondary">${v.name}</span>`);
                    });

                    return {
                        col1: ++no,
                        col2: `<img src="./images/products/${v.avatar}" width="60px" height="60px">`,
                        col3: v.name,
                        col4: new Intl.NumberFormat("vi-VN", { style: 'currency', currency: 'VND' }).format(v.price),
                        col5: v.amount,
                        col6: tag.join(" "),
                        col7: `
                            <button class="btn btn-warning btn-action" title="Restore" onclick="Product.restore(${v.id})">
                                <span class="fas fa-trash-restore"></span>
                            </button>
                            <button class="btn btn-danger btn-action" title="Delete" onclick="Product.destroy(${v.id})">
                                <span class="fas fa-times"></span>
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

Product.details = id => {
    $.get(`/admin/product/find-${id}`, res => {
        let tag = [];
        $.each(res.tags, (i, v) => {
            tag.push(`<span class="badge badge-secondary">${v.name}</span>`);
        });
        $("#view-avatar").attr("src", `./images/products/${res.avatar}`);
        $("#view-name").html(`${res.name}`);
        $("#view-amount").html(`${res.amount}`);
        $("#view-price").html(`${res.price}`);
        $("#view-description").html(`${res.description}`);
        $("#view-details").html(`${res.details}`);
        $("#view-category").html(`${res.category.name}`);
        $("#view-tag").html(`${tag.join(" ")}`);
        $("#modal-details").modal("show");
    });
}

Product.remove = id => {
    $.ajax({
        url: `/admin/product/delete-${id}`,
        method: "delete",
        success: res => {
            alert(res);
            Product.table.ajax.reload(null, false);
            Product.tableTrash.ajax.reload();
        }
    });

}

Product.edit = id => { console.log(id) }

Product.restore = id => {
    $.ajax({
        url: `/admin/product/restore-${id}`,
        method: "put",
        success: res => {
            alert(res);
            Product.tableTrash.ajax.reload(false, null);
            Product.table.ajax.reload();
        },
        error: res => {
            alert("error");
        }
    });
}

Product.destroy = id => {
    $.ajax({
        url: `/admin/product/destroy-${id}`,
        method: "delete",
        success: res => {
            alert(res);
            Product.tableTrash.ajax.reload(false, null);
        },
        error: res => {
            alert("error!");
        }
    });
}

Product.create = () => {
    $("#form-edit")[0].reset();
    $("#submit-form").data("id", null);
    $("#product-modal-header").html("Create Product");
    CKEDITOR.replace("input-description");
    CKEDITOR.replace("input-details");
    $("#form-edit [name='_method']").val("post");
    $("#product-modal-edit").modal("show");
}

Product.edit = id => {
    $.get(`/admin/product/edit-${id}`, res => {
        $("#product-modal-header").html("Edit Product");
        $("#form-edit [name='_method']").val("put");
        $("#submit-form").data("id", id);
        $("#show-img").attr("src", `./images/products/${res.avatar}`);
        $("#input-name").val(`${res.name}`);
        $("#input-price").val(res.price);
        $("#input-amount").val(res.amount);
        $(`#select-category option[value="${res.category_id}"]`).attr("selected", "selected");
        $.each(res.tags, (i, v) => {
            $(`#select-tag option[value="${v.id}"]`).attr("selected", "selected");
        });
        $("#input-description").val(`${res.description}`);
        $("#input-details").val(`${res.details}`);
        CKEDITOR.replace("input-description");
        CKEDITOR.replace("input-details");
        $("#product-modal-edit").modal("show");
    });
}

Product.save = () => {
    let id = $("#submit-form").data("id");
    let data = new FormData($("#form-edit")[0]);
    if (id) {
        $.ajax({
            url: `admin/product/update-${id}`,
            method: "post",
            data: data,
            contentType: false,
            processData: false,
            success: res => {
                alert("success");
                $("#product-modal-edit").modal("hide");
                Product.table.ajax.reload();
            },
            error: res => {
                alert("error");
            }
        });
    } else {
        $.ajax({
            url: `admin/product`,
            method: "post",
            data: data,
            contentType: false,
            processData: false,
            success: res => {
                alert("success");
                $("#product-modal-edit").modal("hide");
                $("#form-edit").reset();
                Product.table.ajax.reload();
            },
            error: res => {
                alert("error");
            }

        });
    }
}

Product.showImg = input => {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#show-img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

Product.init = function () {
    Product.drawTable();
    Product.drawTableTrash();
}

$(document).ready(function () {
    Product.init();
});