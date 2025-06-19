@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Bioskop Terdekat</h1>

    @if (isset($lat) && isset($lng))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            Menampilkan hasil berdasarkan lokasi Anda (Lat: {{ $lat }}, Lng: {{ $lng }})
        </div>
    @endif
 <div class="mb-4 p-4 bg-gray-100 rounded">
        <h2 class="font-semibold mb-2">Daftar Bioskop:</h2>
        @if ($cinemas->count())
            <ul class="list-disc list-inside">
                @foreach ($cinemas as $cinema)
                    <li>{{ $cinema->name }} ({{ number_format($cinema->distance, 2) }} km)</li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada bioskop di sekitar lokasi Anda.</p>
        @endif
    </div>
    <div id="map" class="mb-8" style="height: 500px;"></div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($cinemas as $cinema)
            <div class="p-4 border rounded shadow">
                <h2 class="font-bold text-lg">{{ $cinema->name }}</h2>
                <p class="text-sm text-gray-600">{{ $cinema->address }}</p>
                <p class="text-sm text-gray-600">Jarak: {{ number_format($cinema->distance, 2) }} km</p>
                <a href="{{ route('cinema.show', $cinema->id) }}" class="block mt-2 bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700">Lihat Detail</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
@section('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const userLat = {{ $lat }};
    const userLng = {{ $lng }};

    const map = L.map('map').setView([userLat, userLng], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    const userMarker = L.marker([userLat, userLng]).addTo(map).bindPopup('Lokasi Anda').openPopup();

    let routing = null;

    // Tangkap bioskop terdekat (index pertama)
    const cinemas = [
        @foreach ($cinemas as $cinema)
            {
                id: {{ $cinema->id }},
                name: "{{ $cinema->name }}",
                lat: {{ $cinema->latitude }},
                lng: {{ $cinema->longitude }}
            },
        @endforeach
    ];

    // Buat semua marker + popup
    cinemas.forEach(cinema => {
        const m = L.marker([cinema.lat, cinema.lng]).addTo(map);
        m.bindPopup(`
            <b>${cinema.name}</b><br>
            <button onclick="getDirections(${cinema.lat}, ${cinema.lng})"
                class="bg-blue-500 text-white px-2 py-1 rounded">
                Arahkan ke Sini
            </button>
        `);
    });

    // Buat function global agar tombol di popup bisa akses
    window.getDirections = function(destLat, destLng) {
        if (routing) {
            map.removeControl(routing);
        }
        routing = L.Routing.control({
            waypoints: [
                L.latLng(userLat, userLng),
                L.latLng(destLat, destLng)
            ],
            routeWhileDragging: false
        }).addTo(map);
    };

    
    if (cinemas.length > 0) {
        getDirections(cinemas[0].lat, cinemas[0].lng);
    }

});
</script>
@endsection=
{{-- @section('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var userLat = {{ $lat }};
        var userLng = {{ $lng }};

        var map = L.map('map').setView([userLat, userLng], 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        var userMarker = L.marker([userLat, userLng]).addTo(map).bindPopup('Lokasi Anda').openPopup();

        var routing = null;
        var nearestLat = null;
        var nearestLng = null;

        @foreach ($cinemas as $index => $cinema)
            var cinemaLat = {{ $cinema->latitude }};
            var cinemaLng = {{ $cinema->longitude }};
            var marker = L.marker([cinemaLat, cinemaLng]).addTo(map);
            marker.bindPopup(`
                <b>{{ $cinema->name }}</b><br>
                <button onclick="getDirections(${cinemaLat}, ${cinemaLng})" class='bg-blue-500 text-white px-2 py-1 rounded'>Arahkan ke Sini</button>
            `);

            @if ($index == 0)
                nearestLat = cinemaLat;
                nearestLng = cinemaLng;
            @endif
        @endforeach

        window.getDirections = function (destLat, destLng) {
            if (routing) {
                map.removeControl(routing);
            }
            routing = L.Routing.control({
                waypoints: [
                    L.latLng(userLat, userLng),
                    L.latLng(destLat, destLng)
                ],
                routeWhileDragging: false
            }).addTo(map);
        }

        // Otomatis arahkan ke bioskop terdekat saat load
        if (nearestLat && nearestLng) {
            getDirections(nearestLat, nearestLng);
        }
    });
</script>
@endsection --}}
