@extends('dashboard.layouts.main')


@section('container')
    <h1 class="text-center mb-4">Edit Post</h1>

    <div class="container">


        <div class="col-lg-8">
            <form method="POST" action="{{ route('dashboard.post.update', $post->slug) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" value="{{ old('slug', $post->slug) }}">
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
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
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

                    <!-- Input hidden untuk menyimpan oldImage -->
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">

                    <!-- Preview container dengan drag & drop -->
                    <div class="preview-container mb-4" id="previewContainer"
                        style="border: 2px dashed #dee2e6; border-radius: 8px; padding: 1.5rem; text-align: center;
                background-color: #f8f9fa; min-height: 200px; position: relative;">

                        <!-- Tampilkan gambar saat ini jika ada -->
                        @if ($post->image)
                            <img id="currentImagePreview" class="img-fluid rounded mb-3"
                                src="{{ asset('storage/' . $post->image) }}" alt="Current image"
                                style="max-height: 200px; display: block;">
                            <p class="text-muted">Gambar saat ini</p>
                        @endif

                        <!-- Elemen upload -->
                        <div id="uploadElements" style="{{ $post->image ? 'display: none;' : '' }}">
                            <i class="fas fa-cloud-upload-alt"
                                style="font-size: 3rem; color: #6c757d; margin-bottom: 0.5rem;"></i>
                            <p class="mb-1">Drag & drop gambar baru di sini</p>
                            <p class="text-muted mb-3">ATAU</p>
                            <button type="button" class="btn btn-primary" id="browseBtn">
                                <i class="fas fa-folder-open me-2"></i>Pilih File
                            </button>
                        </div>

                        <!-- Preview gambar baru -->
                        <img id="imagePreview" class="img-fluid rounded mt-3" alt="Preview gambar baru"
                            style="max-height: 200px; display: none;">

                        <!-- Tombol hapus -->
                        <button type="button" class="btn btn-danger btn-sm" id="removeBtn"
                            style="position: absolute; top: 10px; right: 10px; display: none;">
                            <i class="fas fa-times me-1"></i> Hapus
                        </button>
                    </div>

                    <!-- Input file tersembunyi -->
                    <input type="file" id="imageInput" class="d-none" name="image" accept="image/*">

                    <!-- Pesan error -->
                    @error('image')
                        <div class="alert alert-danger mt-2">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
                        </div>
                    @enderror

                    <!-- Info alert -->
                    <div class="alert alert-info mt-3" id="infoAlert">
                        <i class="fas fa-info-circle me-2"></i>
                        Ukuran maksimal: 2MB. Format: JPG, JPEG, PNG
                    </div>
                </div>


                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ old('content', $post->content) }}">
                    <trix-editor input="content"></trix-editor>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Post</button>
        </div>



        <script>
            // // Preview Image Script
            // document.addEventListener('DOMContentLoaded', function() {
            //     const imageInput = document.getElementById('imageInput');
            //     const imagePreview = document.getElementById('imagePreview');
            //     const previewContainer = document.getElementById('previewContainer');
            //     const browseBtn = document.getElementById('browseBtn');
            //     const removeBtn = document.getElementById('removeBtn');
            //     const infoAlert = document.getElementById('infoAlert');

            //     // Function to preview image
            //     const previewImage = (file) => {
            //         if (!file || !file.type.match('image.*')) {
            //             infoAlert.textContent = 'Please select a valid image file.';
            //             infoAlert.className = 'alert alert-danger';
            //             return;
            //         }

            //         const reader = new FileReader();

            //         reader.onload = (e) => {
            //             imagePreview.src = e.target.result;
            //             imagePreview.style.display = 'block';
            //             removeBtn.style.display = 'block';
            //             infoAlert.style.display = 'none';

            //             // Hide upload elements
            //             previewContainer.querySelector('.upload-icon').style.display = 'none';
            //             previewContainer.querySelector('p').style.display = 'none';
            //             previewContainer.querySelector('button').style.display = 'none';
            //         };

            //         reader.readAsDataURL(file);
            //     };

            //     // Event listeners
            //     browseBtn.addEventListener('click', () => imageInput.click());

            //     imageInput.addEventListener('change', () => {
            //         if (imageInput.files.length > 0) {
            //             previewImage(imageInput.files[0]);
            //         }
            //     });

            //     removeBtn.addEventListener('click', () => {
            //         imageInput.value = '';
            //         imagePreview.style.display = 'none';
            //         removeBtn.style.display = 'none';

            //         // Show upload elements
            //         previewContainer.querySelector('.upload-icon').style.display = 'block';
            //         previewContainer.querySelectorAll('p').forEach(p => p.style.display = 'block');
            //         browseBtn.style.display = 'block';

            //         infoAlert.style.display = 'block';
            //         infoAlert.className = 'alert alert-info';
            //         infoAlert.innerHTML =
            //             '<i class="fas fa-info-circle me-2"></i>No image selected. Please upload an image to preview.';
            //     });

            //     // Drag and drop functionality
            //     ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            //         previewContainer.addEventListener(eventName, preventDefaults, false);
            //     });

            //     function preventDefaults(e) {
            //         e.preventDefault();
            //         e.stopPropagation();
            //     }

            //     ['dragenter', 'dragover'].forEach(eventName => {
            //         previewContainer.addEventListener(eventName, () => {
            //             previewContainer.classList.add('dragover');
            //         }, false);
            //     });

            //     ['dragleave', 'drop'].forEach(eventName => {
            //         previewContainer.addEventListener(eventName, () => {
            //             previewContainer.classList.remove('dragover');
            //         }, false);
            //     });

            //     previewContainer.addEventListener('drop', (e) => {
            //         const dt = e.dataTransfer;
            //         const files = dt.files;

            //         if (files.length > 0) {
            //             previewImage(files[0]);
            //         }
            //     }, false);
            // });
            document.addEventListener('DOMContentLoaded', function() {
                const imageInput = document.getElementById('imageInput');
                const imagePreview = document.getElementById('imagePreview');
                const previewContainer = document.getElementById('previewContainer');
                const browseBtn = document.getElementById('browseBtn');
                const removeBtn = document.getElementById('removeBtn');
                const uploadElements = document.getElementById('uploadElements');
                const currentImagePreview = document.getElementById('currentImagePreview');
                const infoAlert = document.getElementById('infoAlert');

                // Event ketika container di-klik
                previewContainer.addEventListener('click', (e) => {
                    if (e.target !== removeBtn && e.target !== browseBtn) {
                        imageInput.click();
                    }
                });

                // Event ketika tombol browse di-klik
                browseBtn.addEventListener('click', () => {
                    imageInput.click();
                });

                // Event ketika file dipilih
                imageInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        previewImage(this.files[0]);
                    }
                });

                // Event untuk tombol hapus
                removeBtn.addEventListener('click', function() {
                    resetPreview();
                });

                // Fungsi untuk preview gambar
                function previewImage(file) {
                    // Validasi tipe file
                    if (!file.type.match('image.*')) {
                        showError('File harus berupa gambar (JPG, JPEG, PNG)');
                        return;
                    }

                    // Validasi ukuran file (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        showError('Ukuran gambar maksimal 2MB');
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // Tampilkan preview gambar baru
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                        removeBtn.style.display = 'block';

                        // Sembunyikan elemen upload
                        if (uploadElements) uploadElements.style.display = 'none';

                        // Sembunyikan gambar saat ini jika ada
                        if (currentImagePreview) currentImagePreview.style.display = 'none';

                        // Update info alert
                        infoAlert.innerHTML = `<i class="fas fa-check-circle me-2 text-success"></i>
                                   Gambar baru dipilih: ${file.name}`;
                        infoAlert.className = 'alert alert-success mt-3';
                    };

                    reader.readAsDataURL(file);
                }

                // Fungsi reset preview
                function resetPreview() {
                    imageInput.value = '';
                    imagePreview.style.display = 'none';
                    removeBtn.style.display = 'none';

                    // Tampilkan kembali elemen upload
                    if (uploadElements) uploadElements.style.display = 'block';

                    // Tampilkan kembali gambar saat ini jika ada
                    if (currentImagePreview) currentImagePreview.style.display = 'block';

                    // Reset info alert
                    infoAlert.innerHTML = `<i class="fas fa-info-circle me-2"></i>
                               Ukuran maksimal: 2MB. Format: JPG, JPEG, PNG`;
                    infoAlert.className = 'alert alert-info mt-3';
                }

                // Fungsi tampilkan error
                function showError(message) {
                    infoAlert.innerHTML = `<i class="fas fa-exclamation-circle me-2"></i> ${message}`;
                    infoAlert.className = 'alert alert-danger mt-3';
                    setTimeout(() => {
                        infoAlert.innerHTML = `<i class="fas fa-info-circle me-2"></i>
                                   Ukuran maksimal: 2MB. Format: JPG, JPEG, PNG`;
                        infoAlert.className = 'alert alert-info mt-3';
                    }, 3000);
                }

                // Fungsi drag & drop
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    previewContainer.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                ['dragenter', 'dragover'].forEach(eventName => {
                    previewContainer.addEventListener(eventName, () => {
                        previewContainer.style.borderColor = '#0d6efd';
                        previewContainer.style.backgroundColor = '#e7f1ff';
                    }, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    previewContainer.addEventListener(eventName, () => {
                        previewContainer.style.borderColor = '#dee2e6';
                        previewContainer.style.backgroundColor = '#f8f9fa';
                    }, false);
                });

                previewContainer.addEventListener('drop', (e) => {
                    const dt = e.dataTransfer;
                    const files = dt.files;

                    if (files.length > 0) {
                        previewImage(files[0]);
                    }
                }, false);
            });
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            // Update slug in real-time as title changes
            title.addEventListener('input', function() {
                const titleValue = encodeURIComponent(title.value.trim());

                // If title has content, fetch the slug
                if (titleValue) {
                    fetch(`{{ route('dashboard.post.checkSlug') }}?title=${titleValue}`)
                        .then(response => response.ok ? response.json() : Promise.reject('Error'))
                        .then(data => slug.value = data.slug || '')
                        .catch(() => slug.value = '');
                } else {
                    slug.value = '';
                }
            });

            // Restrict file types for Trix editor
            document.addEventListener('trix-file-accept', function(event) {
                if (!['image/png', 'image/jpeg', 'image/gif'].includes(event.file.type)) {
                    event.preventDefault();
                    alert("Only images are allowed.");
                }
            });
        </script>
    @endsection
