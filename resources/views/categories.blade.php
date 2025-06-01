{{-- Blog Page --}}
@extends('layouts.main')
@section('container')
    <main class="main">

        <h1 class="mb-5">Post Categories</h1>

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">

            @foreach ($categories as $category)
                <ul>
                    <li>
                        <h2><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h2>
                    </li>
                </ul>
            @endforeach

        </section><!-- /Blog Posts Section -->

    </main>
@endsection


