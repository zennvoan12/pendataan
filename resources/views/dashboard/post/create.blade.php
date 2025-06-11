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

                <!-- Image Upload Section -->
                {{-- <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <div class="preview-container mb-4" id="previewContainer">
                        <i class="fas fa-cloud-upload-alt upload-icon"></i>
                        <p class="mb-2">Drag & drop your image here</p>
                        <p class="text-muted mb-3">OR</p>
                        <button class="btn btn-primary" id="browseBtn">
                            <i class="fas fa-folder-open me-2"></i>Browse Files
                        </button>
                        <img id="imagePreview" class="preview-image mt-3 col-sm-5" alt="Preview">
                        <button class="btn btn-danger btn-sm btn-remove" id="removeBtn" style="display: none;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <input type="file" id="imageInput" class="d-none" name="image" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="alert alert-info" id="infoAlert">
                        <i class="fas fa-info-circle me-2"></i>No image selected. Please upload an image to preview.
                    </div>
                </div> --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>

                    <!-- Preview container dengan drag & drop -->
                    <div class="preview-container mb-4" id="previewContainer"
                        style="border: 2px dashed #dee2e6; border-radius: 8px; padding: 1.5rem; text-align: center;
                background-color: #f8f9fa; min-height: 200px; position: relative;
                transition: all 0.3s ease; cursor: pointer;">

                        <!-- Elemen upload -->
                        <div id="uploadElements">
                            <i class="fas fa-cloud-upload-alt upload-icon"
                                style="font-size: 3rem; color: #6c757d; margin-bottom: 0.5rem; transition: all 0.3s ease;"></i>
                            <p class="mb-2">Drag & drop your image here</p>
                            <p class="text-muted mb-3">OR</p>
                            <button type="button" class="btn btn-primary" id="browseBtn">
                                <i class="fas fa-folder-open me-2"></i>Browse Files
                            </button>
                        </div>

                        <!-- Preview gambar baru -->
                        <img id="imagePreview" class="preview-image mt-3" alt="Preview"
                            style="max-height: 200px; max-width: 100%; display: none;">

                        <!-- Tombol hapus -->
                        <button type="button" class="btn btn-danger btn-sm btn-remove" id="removeBtn"
                            style="position: absolute; top: 10px; right: 10px; display: none;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- Input file tersembunyi -->
                    <input type="file" id="imageInput" class="d-none" name="image" accept="image/*">

                    <!-- Pesan error -->
                    @error('image')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Info alert -->
                    <div class="alert alert-info mt-2" id="infoAlert">
                        <i class="fas fa-info-circle me-2"></i>No image selected. Please upload an image to preview.
                    </div>
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
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const imageInput = document.getElementById('imageInput');
                const imagePreview = document.getElementById('imagePreview');
                const previewContainer = document.getElementById('previewContainer');
                const browseBtn = document.getElementById('browseBtn');
                const removeBtn = document.getElementById('removeBtn');
                const uploadElements = document.getElementById('uploadElements');
                const infoAlert = document.getElementById('infoAlert');

                // Event ketika container di-klik
                previewContainer.addEventListener('click', (e) => {
                    // Hanya trigger jika bukan tombol hapus atau browse
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
                        showError('File must be an image (JPG, JPEG, PNG)');
                        return;
                    }

                    // Validasi ukuran file (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        showError('Maximum file size is 2MB');
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // Tampilkan preview gambar baru
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                        removeBtn.style.display = 'block';

                        // Sembunyikan elemen upload
                        uploadElements.style.display = 'none';

                        // Update info alert
                        infoAlert.innerHTML = `<i class="fas fa-check-circle me-2 text-success"></i>
                                   Image selected: ${file.name}`;
                        infoAlert.className = 'alert alert-success mt-2';
                    };

                    reader.readAsDataURL(file);
                }

                // Fungsi reset preview
                function resetPreview() {
                    imageInput.value = '';
                    imagePreview.style.display = 'none';
                    removeBtn.style.display = 'none';

                    // Tampilkan kembali elemen upload
                    uploadElements.style.display = 'block';

                    // Reset info alert
                    infoAlert.innerHTML =
                        `<i class="fas fa-info-circle me-2"></i>No image selected. Please upload an image to preview.`;
                    infoAlert.className = 'alert alert-info mt-2';
                }

                // Fungsi tampilkan error
                function showError(message) {
                    infoAlert.innerHTML = `<i class="fas fa-exclamation-circle me-2"></i> ${message}`;
                    infoAlert.className = 'alert alert-danger mt-2';
                    setTimeout(() => {
                        infoAlert.innerHTML =
                            `<i class="fas fa-info-circle me-2"></i>No image selected. Please upload an image to preview.`;
                        infoAlert.className = 'alert alert-info mt-2';
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

                // Animasi hover untuk ikon
                previewContainer.addEventListener('mouseenter', () => {
                    const icon = previewContainer.querySelector('.upload-icon');
                    if (icon) {
                        icon.style.color = '#0d6efd';
                        icon.style.transform = 'translateY(-5px)';
                    }
                });

                previewContainer.addEventListener('mouseleave', () => {
                    const icon = previewContainer.querySelector('.upload-icon');
                    if (icon) {
                        icon.style.color = '#6c757d';
                        icon.style.transform = 'translateY(0)';
                    }
                });
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
    @endpush

    <style>
        .preview-container:hover {
            border-color: #adb5bd;
            background-color: #f0f2f5;
        }

        .preview-container.dragover {
            border-color: #0d6efd;
            background-color: #e7f1ff;
            transform: scale(1.02);
        }

        .btn-remove {
            z-index: 10;
        }

        .preview-image {
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
