{{-- Blog Page --}}
@extends('layouts.main')
@section('container')
    <main class="main">

        <h1 class="mb-5">Post Category : {{ $category }}</h1>

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">

            @foreach ($posts as $post)
                <ul>
                    <li>
                        <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
                    </li>
                </ul>
            @endforeach

        </section>
        <!-- /Blog Posts Section -->

    </main>
@endsection


