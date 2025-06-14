@extends('layouts.main')

@section('container')
    <section class="container my-5">
        <h1 class="mb-3">{{ $alumnus->name }}</h1>
        @if($alumnus->photo)
            <img src="{{ asset('storage/' . $alumnus->photo) }}" alt="Profile Photo" class="img-thumbnail mb-3" width="150">
        @endif
        @if($alumnus->occupation)
            <p><strong>Occupation:</strong> {{ $alumnus->occupation }}</p>
        @endif
        @if($alumnus->education_level)
            <p><strong>Education:</strong> {{ $alumnus->education_level }}</p>
        @endif
        <p><strong>Status:</strong> {{ $alumnus->is_active ? 'Active' : 'Inactive' }}</p>
        @if($alumnus->bio)
            <p class="mb-4">{{ $alumnus->bio }}</p>
        @endif
    </section>
@endsection
