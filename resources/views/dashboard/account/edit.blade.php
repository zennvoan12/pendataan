@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <h1 class="mb-4">Edit Profile</h1>
    <form method="POST" action="{{ route('account.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}" required>
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="occupation" class="form-label">Occupation</label>
            <input type="text" class="form-control @error('occupation') is-invalid @enderror" id="occupation" name="occupation" value="{{ old('occupation', $user->occupation) }}">
            @error('occupation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="education_level" class="form-label">Education Level</label>
            <input type="text" class="form-control @error('education_level') is-invalid @enderror" id="education_level" name="education_level" value="{{ old('education_level', $user->education_level) }}">
            @error('education_level')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="twitter" class="form-label">Twitter URL</label>
            <input type="url" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{ old('twitter', $user->twitter) }}">
            @error('twitter')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="facebook" class="form-label">Facebook URL</label>
            <input type="url" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook', $user->facebook) }}">
            @error('facebook')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="instagram" class="form-label">Instagram URL</label>
            <input type="url" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram', $user->instagram) }}">
            @error('instagram')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="linkedin" class="form-label">LinkedIn URL</label>
            <input type="url" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" value="{{ old('linkedin', $user->linkedin) }}">
            @error('linkedin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $user->is_active) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active Alumni</label>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" alt="Current Photo" class="img-thumbnail d-block mb-2" width="150">
            @endif
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (leave blank to keep current)</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('account.show') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
