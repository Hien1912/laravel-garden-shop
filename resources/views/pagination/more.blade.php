@if ($paginator->hasMorePages())
<a class="btn btn-primary btn-lg btn-block pagination" onclick="event.preventDefault();paginate(this)"
    href="{{ $paginator->nextPageUrl() }}">
    <span class="mx-auto">View More</span>
</a>
@endif