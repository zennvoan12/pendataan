<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Data Alumni</h2>
        {{-- <a href="{{ route('alumni.create') }}" class="btn btn-primary mb-4">Add Alumni</a> --}}
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Birth Year</th>
                    <th>Graduation Year</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Job</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnis as $alumni)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alumni->name }}</td>
                        <td>{{ $alumni->birth_year }}</td>
                        <td>{{ $alumni->graduation_year }}</td>
                        <td>{{ $alumni->email }}</td>
                        <td>{{ $alumni->phone }}</td>
                        <td>{{ $alumni->address }}</td>
                        <td>{{ $alumni->job }}</td>
                        <td>{{ $alumni->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
