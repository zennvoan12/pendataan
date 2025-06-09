@extends('dashboard.layouts.main')



@section('container')
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
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>@mdo</td>
            </tr>
                @endforeach



        </tbody>
    </table>
@endsection
