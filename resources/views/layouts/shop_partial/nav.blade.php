<div class="container-fluid bg-success sticky-top" id="nav-categories">
    <nav class="navbar navbar-expand-lg container-md position-relative">
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/about">Giới thiệu</a>
                </li>
                @foreach(App\Category::all() as $category)
                <li class="nav-item categories">
                    <div class="d-flex">
                        <a class="nav-link" href="/?category={{ $category->id }}">{{ ucfirst($category->name) }}</a>
                        <span class="d-lg-none" data-target="#category-{{ $category->id }}" data-toggle="collapse">+</span>
                    </div>
                    <div id="category-{{ $category->id }}" class="collapse">
                        @foreach($category->tags as $tag)
                            <a class="dropdown-item active bg-success" href="/?tag={{ $tag->id }}">{{ ucfirst($tag->name)}}</a>
                        @endforeach
                    </div>
                </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Liên hệ</a>
                </li>
            </ul>
        </div>
    </nav>
</div>