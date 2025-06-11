@extends('dashboard.layouts.main')


@section('container')
    <h1 class="text-center mb-4">Create New Post</h1>

    <div class="container">


        <div class="col-lg-8">
            <form method="POST" action="{{ route('dashboard.post.index') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image" accept=".jpg, .jpeg, .png">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                    <trix-editor input="content"></trix-editor>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create Post</button>
        </div>



        <script>
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            // Use 'input' event for real-time updates as the user types
            title.addEventListener('input', function() {
                const titleValue = encodeURIComponent(title.value); // URL encode the title

                // Only make the fetch request if the title has content
                if (titleValue.trim() !== "") {
                    fetch(`{{ route('dashboard.post.checkSlug') }}?title=${titleValue}`)
                        .then(response => {
                            // Check if the response is OK
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Check if slug is returned and update the slug field
                            if (data.slug) {
                                slug.value = data.slug;
                            } else {
                                console.error('No slug returned');
                                // Optionally, clear the slug input or set a default value
                                slug.value = '';
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            // Optionally, handle errors (e.g., clear the slug input or show an error message)
                            slug.value = '';
                        });
                } else {
                    // Optionally clear the slug field if the title is empty
                    slug.value = '';
                }
            });

            document.addEventListener('trix-file-accept', function(event) {
                const acceptedTypes = ['image/png', 'image/jpeg', 'image/gif'];
                if (!acceptedTypes.includes(event.file.type)) {
                    event.preventDefault();
                    alert("Only images are allowed.");
                }
            });
        </script>
    @endsection
