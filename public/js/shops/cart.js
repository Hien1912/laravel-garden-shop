$(document).ready(() => {
    $('.qty-minus').click(function () {
        let val = +$(this).siblings('input').val();
        let id = $(this).siblings('input').data('id');
        if (val-- > 1) {
            Obj.cartUpdate(id, val);
        }
    });

    $('.qty-plus').click(function () {
        let val = +$(this).siblings('input').val();
        let id = $(this).siblings('input').data('id');
        let max = +$(this).siblings('input').attr('max');
        if (val < 10 && val++ < max) {
            Obj.cartUpdate(id, val);
        }
    });
});
