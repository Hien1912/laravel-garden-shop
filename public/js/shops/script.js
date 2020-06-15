let Obj = {} || Obj;

Obj.cart = function (id, qty = 1) {
    let url = location.origin + `/san-pham-${id}/add-${qty}`;
    $.ajax({
        url: `${url}`,
        method: "post",
        async: false,
        cache: false,
        timeout: 30000,
        success: function (res) {
            Obj.cartSuccess(res);
        },
        error: function (res) {
            Obj.error(res);
        }
    });
}

Obj.cartUpdate = (id, qty) => {
    let url = location.origin + `/san-pham-${id}/add-${qty}`;
    $.ajax({
        url: `${url}`,
        method: "post",
        async: false,
        cache: false,
        timeout: 30000,
        success: function (res) {
            Obj.cartSuccess(res);
            $(`[data-id="${id}"]`).val(qty);
            $('#totalPrice').html(Obj.currency(res.price));
            $('#totalQty').html(res.qty);
        },
        error: function (res) {
            Obj.error(res);
        }
    });
}

Obj.cartDelete = function (id) {
    let url = location.origin + `/san-pham-${id}/delete`;
    $.ajax({
        url: url,
        method: 'delete',
        async: false,
        cache: false,
        timeout: 30000,
        success: function (res) {
            $(`#row-${id}`).remove();
            $('#shopping-cart').html(`(${res.qty})`);
            $('#totalPrice').html(Obj.currency(res.price));
            $('#totalQty').html(res.qty);
            if (!$('.cart-details').html()) {
                location.reload();
            }
        }, error: function (res) {
            Obj.error(res);
        }
    });
}

Obj.cartOrder = function () {
    let data = new FormData($('#form-order')[0]);
    let url = $('#form-order').attr('action');
    $.ajax({
        url: url,
        method: 'post',
        processData: false,
        contentType: false,
        data: data,
        success: function (res) {

        },
        error: function (res) {
            $('#form-order input').removeClass(['is-valid', 'is-invalid']);
            $('#form-order small').remove();
            if (res.status == 422) {
                $('#form-order input').addClass('is-valid');
                let errors = res.responseJSON.errors;
                $.each(errors, function (k, v) {
                    $(`[name=${k}]`).removeClass('in-valid').addClass('is-invalid').after(`
                        <small class="text-danger">
                            <i>${v[0]}</i>
                        </small>
                    `);

                });
            }
        }
    });
}

Obj.currency = function (number) {
    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number)
}

Obj.nextPage = function (page) {
    let href = location.origin;
    href += `/paginate/`;
    href += location.search ? `${location.search}&page=` : `?page=`;
    href += page;
    $.get(`${href}`).done(function (data) {
        $('#next-page').remove();
        $('#show-all-product').append(data);
    });
}

Obj.cartSuccess = function (res) {
    let head = res.msg ? "Cập nhật" : 'Thêm';
    let text = res.msg ? "cập nhật" : 'thêm';
    $.toast({
        text: res.name + `đã được ${text} thành công.`,
        heading: `${head} giỏ hàng`,
        icon: "success",
        showHideTransition: "plain",
        hideAfter: 5000,
        stack: 1,
        position: "top-center",
    });

    $('#shopping-cart').html(`(${res.qty})`);
}

Obj.error = function (res) {
    $.toast({
        text: "Thao tác không thành công",
        icon: "error",
        showHideTransition: "plain",
        hideAfter: 5000,
        stack: 1,
        position: "top-center",
        loader: true,
        loaderBg: "#aaaa"
    });
}

Obj.notification = function () {
    $.toast({
        text: "Don't forget to star the repository if you like it.", // Text that is to be shown in the toast
        heading: 'Note', // Optional heading to be shown on the toast
        icon: 'warning', // Type of toast icon
        showHideTransition: 'fade', // fade, slide or plain
        allowToastClose: true, // Boolean value true or false
        hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
        stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
        position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
        textAlign: 'left',  // Text alignment i.e. left, right or center
        loader: true,  // Whether to show loader or not. True by default
        loaderBg: '#9EC600',  // Background color of the toast loader
        beforeShow: function () { }, // will be triggered before the toast is shown
        afterShown: function () { }, // will be triggered after the toat has been shown
        beforeHide: function () { }, // will be triggered before the toast gets hidden
        afterHidden: function () { }  // will be triggered after the toast has been hidden
    });
}


$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});

$(document).ajaxStart(function () {
    $("#loading").show();
});

$(document).ajaxStop(function () {
    $("#loading").hide();
});

