{{-- Blog Page --}}
@extends('layouts.main')
@section('container')
    <main class="main">


        <h1 class="fs-1 text-2xl p-5 text-center"> {{ $title }}</h1>

        <!-- Blog Posts Section -->

        @if ($posts->count())
            <section id="blog" class="blog section card mb-5">
                <div class="card text-bg-dark">
                    <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                        <img src="https://picsum.photos/1200/400??{{ $posts[0]->category->name }}" class="card-img"
                            alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">{{ $posts[0]->title }}</h5>
                            <p class="card-text">{{ $posts[0]->excerpt }}</p>
                            <i class="bi bi-person"></i> <span class="ps-2"><a
                                    href="/blog?author=/{{ $posts[0]->author->username }}"
                                    class="text-decoration-none text-white">{{ $posts[0]->author->name }}</a>
                            </span>
                            <p><a href="/blog?category=/{{ $posts[0]->category->name }}"
                                    class="text-decoration-none text-white"> <i class="bi bi-folder2"></i>
                                    <span class="ps-2">{{ $posts[0]->category->name }}</span>
                                </a></p>
                            <p class="card-text"><small>{{ $posts[0]->created_at->diffForHumans() }}</small></p>

                        </div>
                </div>
            </section>
            </a>
        @else
            <section id="blog" class="blog section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 entries">

                            <h1 class="text-center">No Posts Found</h1>
                            <p class="text-center">Please check back later.</p>

                        </div>
                    </div>
                </div>
        @endif




        <div class="container">
            <div class="row gy-4">

                @foreach ($posts->skip(1) as $post)
                    <div class="col-lg-4">
                        <article class="position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="">
                                @else
                                    @if ($post->category)
                                        <img src="https://picsum.photos/1200/800??{{ $post->category->name }}"
                                            class="img-fluid" alt="">
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
                                            <i class="bi bi-person"></i> <span class="ps-2">{{ $post->author->name }}

                                            </span>
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

                                <p>
                                    {{ $post->excerpt }}
                                </p>

                                <span class="post-date"><i class="bi bi-clock"></i> <time
                                        datetime="2020-01-01">{{ $post->created_at->diffForHumans() }}</time></span>
                                <hr>

                                <a href="/blog/{{ $post->slug }}" class="readmore "><span>Read
                                        More</span><i class="bi bi-arrow-right"></i></a>

                            </div>

                        </article>
                    </div>
                    <!-- End post list item -->
                @endforeach

            </div>
        </div>





        <section id="blog-pagination" class="blog-pagination section">
            <div class="container">
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
        <!-- /Blog Pagination Section -->

    </main>
@endsection
