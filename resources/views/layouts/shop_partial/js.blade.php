<script src="./js/shops/script.js"></script>
@stack('js')
<script>
    
    $(document).ready(function () {
        $('.btn-group, .dropdown-menu').hover(function () {
            let btn = $(this).parent();
            $('.dropdown-menu').removeClass('show');
            $(btn).find('.dropdown-menu').addClass('show');
        });

        $('.btn-group, .dropdown-menu').mouseleave(function () {
            $('.dropdown-menu').removeClass('show');
        });

        $(".pagination a").click(function () {
            $('html, body').animate({
                scrollTop: $("body").offset().top
            }, 2000);
        });
    });

    function showCart(){
        $("#cart-hover").addClass('show');
    }

    function closeCart(){
        $("#cart-hover").removeClass('show');
    }

</script>
</html>