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
                            <h5 class="card-title">
                                <a href="{{ route('alumni.show', $user->username) }}" class="text-decoration-none">
                                    {{ $user->name }}
                                </a>
                            </h5>
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
