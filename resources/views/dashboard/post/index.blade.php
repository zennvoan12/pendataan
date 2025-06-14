@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-center mb-4 ">Posts</h1>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="d-lg-flex justify-content-between  ms-5">
        <div class="col-lg-8">
            <a href="/dashboard/blog/create" class="btn btn-primary">Create New Post</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <a href="{{ route('dashboard.post.show', $post->slug) }}" class="badge bg-info"
                                    title="View">
                                    <span data-feather="eye"></span>
                                </a>
                                <a href="{{ route('dashboard.post.edit', $post->slug) }}" class="badge bg-warning"
                                    title="Edit">
                                    <span data-feather="edit"></span>
                                </a>
                                <form action="{{ route('dashboard.post.destroy', $post->slug) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('delete')
                                    <button class="badge bg-danger border-0" type="submit" title="Delete">
                                        <span data-feather="trash-2"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
