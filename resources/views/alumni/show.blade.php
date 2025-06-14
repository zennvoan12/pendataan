@extends('layouts.main')

@section('container')
    <section class="container my-5">
        <h1 class="mb-3">{{ $alumnus->name }}</h1>
        @if($alumnus->photo)
            <img src="{{ asset('storage/' . $alumnus->photo) }}" alt="Profile Photo" class="img-thumbnail mb-3" width="150">
        @endif
        @if($alumnus->bio)
            <p class="mb-4">{{ $alumnus->bio }}</p>
        @endif
    </section>
@endsection
