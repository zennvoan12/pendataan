@extends('layouts.main')

@section('container')
    <section class="container my-5">
        <h1 class="mb-3">{{ $alumnus->name }}</h1>
        @if($alumnus->bio)
            <p class="mb-4">{{ $alumnus->bio }}</p>
        @endif
        @if($posts->count())
            <h3 class="mt-5 mb-3">Posts</h3>
            @include('partials.posts-grid', ['posts' => $posts])
        @else
            <p>No posts yet.</p>
        @endif
    </section>
@endsection
