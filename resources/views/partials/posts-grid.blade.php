<div class="container">
    <div class="row gy-4">
        @foreach ($posts as $post)
            <div class="col-lg-4">
                <article class="position-relative h-100">
                    <div class="post-img position-relative overflow-hidden">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="">
                        @else
                            @if ($post->category)
                                <img src="https://picsum.photos/1200/800??{{ $post->category->name }}" class="img-fluid" alt="">
                            @else
                                <img src="https://picsum.photos/1200/800" class="img-fluid" alt="">
                            @endif
                        @endif
                    </div>

                    <div class="post-content d-flex flex-column">
                        <h3 class="post-title">{{ $post->title }}</h3>
                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">
                                    <i class="bi bi-person"></i> <span class="ps-2">{{ $post->author->name }}</span>
                                </a>
                            </div>
                            <span class="px-3 text-black-50">/</span>
                            <div class="d-flex align-items-center">
                                <a href="/blog?category={{ $post->category->name }}" class="text-decoration-none ">
                                    <i class="bi bi-folder2"></i>
                                    <span class="ps-2">{{ $post->category->name }}</span>
                                </a>
                            </div>
                        </div>
                        <p>{{ $post->excerpt }}</p>
                        <span class="post-date"><i class="bi bi-clock"></i> <time datetime="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</time></span>
                        <hr>
                        <a href="/blog/{{ $post->slug }}" class="readmore"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
</div>
