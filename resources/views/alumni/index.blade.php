@extends('layouts.main')
@php use Illuminate\Support\Str; @endphp

@section('container')
    <section class="container my-5">
        <h1 class="mb-4">Alumni</h1>
        <div class="row">
            @foreach ($alumni as $user)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            @if($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Photo" class="img-thumbnail mb-2" width="100">
                            @endif
                            <h5 class="card-title">
                                <a href="{{ route('alumni.show', $user->username) }}" class="text-decoration-none">
                                    {{ $user->name }}
                                </a>
                            </h5>
                            @if($user->occupation)
                                <p class="mb-1"><strong>Occupation:</strong> {{ $user->occupation }}</p>
                            @endif
                            @if($user->education_level)
                                <p class="mb-1"><strong>Education:</strong> {{ $user->education_level }}</p>
                            @endif
                            <p class="mb-1"><strong>Status:</strong> {{ $user->is_active ? 'Active' : 'Inactive' }}</p>
                            <div class="mb-1">
                                @if($user->twitter)
                                    <a href="{{ $user->twitter }}" target="_blank" class="me-1"><i class="bi bi-twitter-x"></i></a>
                                @endif
                                @if($user->facebook)
                                    <a href="{{ $user->facebook }}" target="_blank" class="me-1"><i class="bi bi-facebook"></i></a>
                                @endif
                                @if($user->instagram)
                                    <a href="{{ $user->instagram }}" target="_blank" class="me-1"><i class="bi bi-instagram"></i></a>
                                @endif
                                @if($user->linkedin)
                                    <a href="{{ $user->linkedin }}" target="_blank" class="me-1"><i class="bi bi-linkedin"></i></a>
                                @endif
                            </div>
                            @if($user->bio)
                                <p class="card-text">{{ Str::limit($user->bio, 80) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $alumni->links() }}
    </section>
@endsection
