@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <h1 class="mb-4">My Profile</h1>
    @if($user->photo)
        <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Photo" class="img-thumbnail mb-3" width="150">
    @endif
    <dl class="row">
        <dt class="col-sm-3">Name</dt>
        <dd class="col-sm-9">{{ $user->name }}</dd>
        <dt class="col-sm-3">Username</dt>
        <dd class="col-sm-9">{{ $user->username }}</dd>
        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9">{{ $user->email }}</dd>
        @if($user->bio)
            <dt class="col-sm-3">Bio</dt>
            <dd class="col-sm-9">{{ $user->bio }}</dd>
        @endif
        @if($user->occupation)
            <dt class="col-sm-3">Occupation</dt>
            <dd class="col-sm-9">{{ $user->occupation }}</dd>
        @endif
        @if($user->education_level)
            <dt class="col-sm-3">Education Level</dt>
            <dd class="col-sm-9">{{ $user->education_level }}</dd>
        @endif
        <dt class="col-sm-3">Status</dt>
        <dd class="col-sm-9">{{ $user->is_active ? 'Active' : 'Inactive' }}</dd>
    </dl>
    <a href="{{ route('account.edit') }}" class="btn btn-primary">Edit Profile</a>
</div>
@endsection
