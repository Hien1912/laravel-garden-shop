$(document).ready(() => {
    $('#qty-minus').click(() => {
        let val = +$("#qty-val").val();
        if (val > 1) {
            $("#qty-val").val(--val);
        }
    });

    $('#qty-plus').click(() => {
        let val = $("#qty-val").val();
        console.log("val", val);
        let max = $("#qty-val").attr('max');
        console.log("max", max);
        if (val < max && val < 10) {
            $("#qty-val").val(++val);
        }
    });
});