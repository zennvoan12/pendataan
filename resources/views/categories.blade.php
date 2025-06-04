{{-- Blog Page --}}
@extends('layouts.main')
@section('container')
    <main class="main">

        <h1 class="mb-5 text-center pt-2">Post Categories</h1>

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">





            <div class="container">
                <div class="row gy-4">
                    @foreach ($categories as $category)
                        <div class="col-lg-4">
                            <article class="position-relative h-100">

                                <div class="post-img position-relative overflow-hidden">
                                    <img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt="">
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $category->name }}</h3>

                                    <div class="meta d-flex align-items-center">

                                        <span class="px-3 text-black-50"></span>

                                    </div>



                                    <hr>

                                    <a href="/categories/{{ $category->slug }}"
                                        class="readmore stretched-link"><span></span><i class="bi bi-arrow-right"></i></a>

                                </div>

                            </article>

                        </div>
                    @endforeach
                    <!-- End post list item -->


                </div>
            </div>
            {{-- @foreach ($categories as $category)
                <ul>
                    <li>
                        <h2><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h2>
                    </li>
                </ul>
            @endforeach --}}

        </section><!-- /Blog Posts Section -->

    </main>
@endsection
