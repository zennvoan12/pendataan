@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <h1 class="mb-4">My Profile</h1>
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
    </dl>
    <a href="{{ route('account.edit') }}" class="btn btn-primary">Edit Profile</a>
</div>
@endsection
