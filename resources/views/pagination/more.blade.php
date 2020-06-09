@if ($paginator->hasMorePages())
<a class="btn btn-primary btn-lg btn-block pagination" id="next-page" data-next="{{ $paginator->currentPage() + 1 }}">
    <span class="mx-auto">View More</span>
</a>
<script>
    $(document).ready(function(){
        $('#next-page').click(function(e){
            e.preventDefault();
            let href = location.origin;
            href += `/paginate/`;
            href += location.search[1] ? `${location.search[1]}&page=`: `?page=`;
            href +=$(this).data('next');
            console.log(href);
            $.get(`${href}`).done(function(data){
                $('.pagination').remove();
                $('#list-product').append(data);
            });
        });
    });
</script>
@endif