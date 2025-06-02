{{-- Blog Page --}}
@extends('layouts.main')
@section('container')
    <main class="main">



        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">

            <h1 class="mb-5"> {{ $title }}</h1>

            @foreach ($posts as $post)
                <article class="mb-5">
                    <h2>
                        <a href="/blog/{{ $post->slug }}"> {{ $post->title }}</a>
                    </h2>
                    <h5>By : <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a
                            href="/categories/{{ $post->category->slug }}">   {{ $post->category->name }}</a> </h5>
                    <p>{{ $post->content }}</p>
                </article>
            @endforeach

        </section><!-- /Blog Posts Section -->

        <!-- Blog Pagination Section -->
        <section id="blog-pagination" class="blog-pagination section">

            <div class="container">
                <div class="d-flex justify-content-center">
                    <ul>
                        <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#" class="active">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li>...</li>
                        <li><a href="#">10</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>

        </section>
        <!-- /Blog Pagination Section -->

    </main>
@endsection
