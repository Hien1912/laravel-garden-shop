$(document).ready(() => {

    $('.product-minus').click(() => {
        let minus = +$('#qty').val();
        if (minus > 1) {
            $('#qty').val(--minus);
        }
    });

    $('.product-plus').click(() => {
        let plus = +$('#qty').val();
        let max = +$('#qty').attr('max');
        if (plus < max) {
            $('#qty').val(++plus);
        }
    });

    $('#qty').on('input', function () {
        let val = $(this).val();
        let max = +$('#qty').attr('max');
        if (val < 1)
            $(this).val(1);
        if (val > max)
            $(this).val(max);
    });

    $('.product-shopping').on('click', '.btn', function () {
        let qty = $('#qty').val();
        let id = $("#qty").data('id');
        Obj.cart(id, qty);
    });
});