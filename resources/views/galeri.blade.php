<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mt-5">
        <h1 class="text-center mb-5">Galeri Kegiatan</h1>
        <div class="row">
            @foreach ($galeri as $galery)

            <div class="col-md-4 mb-4">
                <div class="card image-card">
                    <img src="{{ $galery->image }}" class="card-img-top" alt="Deskripsi">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>
