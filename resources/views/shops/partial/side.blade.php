<ul class="list-group list-category">
    @foreach($category as $item)
    <li class="list-group-item category-item">
        <h4 class="bg-success">{{ ucfirst($item->name) }}</h4>
        <ul class="list-group list-tag">
            @foreach($item->tags as $tag)
            <li class="list-group-item tag-item">
                <a href="/?tag={{ $tag->id }}"
                    class="btn btn-link text-decoration-none p-0">{{ ucfirst($tag->name) }}</a>
            </li>
            @endforeach
        </ul>
    </li>
    @endforeach
</ul>`