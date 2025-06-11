@extends('dashboard.layouts.main')



@section('container')
    <div class="row">
        <!-- Statistik Utama -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Total Posts</h5>
                                    <h2 class="card-text">{{ $stats['total_posts'] }}</h2>
                                </div>
                                <i class="fas fa-file-alt fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('dashboard.post.index') }}">
                                View Details
                            </a>
                            <div class="small text-white"><i class="fas fa-arrow-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Published</h5>
                                    <h2 class="card-text">{{ $stats['published_posts'] }}</h2>
                                </div>
                                <i class="fas fa-check-circle fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link"
                                href="{{ route('dashboard.post.index', ['filter' => 'published']) }}">
                                View Details
                            </a>
                            <div class="small text-white"><i class="fas fa-arrow-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Drafts</h5>
                                    <h2 class="card-text">{{ $stats['draft_posts'] }}</h2>
                                </div>
                                <i class="fas fa-edit fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link"
                                href="{{ route('dashboard.post.index', ['filter' => 'drafts']) }}">
                                View Details
                            </a>
                            <div class="small text-white"><i class="fas fa-arrow-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Total Views</h5>
                                    <h2 class="card-text">{{ $stats['total_views'] }}</h2>
                                </div>
                                <i class="fas fa-eye fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('dashboard.post.index') }}">
                                View Details
                            </a>
                            <div class="small text-white"><i class="fas fa-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Postingan Terbaru -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Posts</h5>
                    <a href="{{ route('dashboard.post.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus me-1"></i> Create New
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ \Illuminate\Support\Str::limit($post->title, 30) }}</td>
                                        <td>
                                            @if ($post->category)
                                                {{ $post->category->name }}
                                            @else
                                                <span class="text-danger">No Category</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->views }}</td>
                                        <td>
                                            @if ($post->published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <!-- ... tombol aksi ... -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($posts->isEmpty())
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle me-2"></i>
                            You haven't created any posts yet.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Kategori Populer -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Top Categories</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($categories as $category)
                            <a href="{{ route('dashboard', ['category' => $category->slug]) }}"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                {{ $category->name }}
                                <span class="badge bg-primary rounded-pill">{{ $category->blogs_count }}</span>
                            </a>
                        @endforeach
                        @if ($categories->isEmpty())
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle me-2"></i>
                                No categories found.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Postingan Paling Populer -->
            @if ($stats['most_popular_post'])
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Most Popular Post</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            @if ($stats['most_popular_post']->image)
                                <img src="{{ asset('storage/' . $stats['most_popular_post']->image) }}"
                                    class="img-fluid rounded me-3" style="width: 80px; height: 80px; object-fit: cover;"
                                    alt="{{ $stats['most_popular_post']->title }}">
                            @else
                                <div class="bg-secondary rounded me-3 d-flex align-items-center justify-content-center"
                                    style="width: 80px; height: 80px;">
                                    <i class="fas fa-image text-white fa-2x"></i>
                                </div>
                            @endif
                            <div>
                                <h6 class="mb-1">{{ $stats['most_popular_post']->title }}</h6>
                                <p class="mb-1 text-muted">
                                    <i class="fas fa-eye me-1"></i> {{ $stats['most_popular_post']->views }} views
                                </p>
                                <a href="{{ route('dashboard.post.edit', $stats['most_popular_post']->slug) }}"
                                    class="btn btn-sm btn-outline-primary mt-2">
                                    View Post
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
