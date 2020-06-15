@if ($paginator->hasMorePages())
<a class="btn btn-success btn-lg btn-block pagination" id="next-page" onclick="Obj.nextPage({{ $paginator->currentPage() + 1 }})">
    <span class="mx-auto">View More</span>
</a>
@endif