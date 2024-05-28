<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <h1 class="mt-5">Berita Kegiatan</h1>
        <div class="row">
            @foreach ($activities as $activity)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $activity->image }}" class="card-img-top" alt="Activity Image"> <!-- Add this line -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $activity->title }}</h5>
                            <p class="card-text">{{ $activity->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $activity->activity_date }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
