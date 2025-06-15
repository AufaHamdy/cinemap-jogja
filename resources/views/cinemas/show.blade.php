@extends('layouts.app')

@section('content')
<section class="pt-28 pb-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="bg-white glass-effect rounded-xl shadow-lg p-8">
            <!-- Judul -->
            <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $cinema->name }}</h1>
            <p class="text-lg text-gray-600 mb-6">{{ $cinema->tagline ?? 'Cinema Experience' }}</p>

            <!-- Grid -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Info + Gambar -->
                <div>
                    @if ($cinema->image)
                        <img src="{{ asset('storage/' . $cinema->image) }}"
                             alt="{{ $cinema->name }}"
                             class="rounded-lg shadow-md w-full h-auto mb-6">
                    @endif

                    <div class="space-y-3 text-gray-700">
                        <p><i class="fas fa-map-marker-alt text-blue-600 mr-2"></i> <strong>Alamat:</strong> {{ $cinema->address }}</p>
                        <p><i class="fas fa-clock text-blue-600 mr-2"></i> <strong>Jam Buka:</strong> {{ $cinema->opening_hours ?? '-' }}</p>
                        <p><i class="fas fa-star text-yellow-500 mr-2"></i> <strong>Rating:</strong> {{ $cinema->rating ?? '-' }} ({{ $cinema->total_reviews ?? 0 }} ulasan)</p>
                        <p><i class="fas fa-info-circle text-blue-600 mr-2"></i> <strong>Deskripsi:</strong> {{ $cinema->description ?? 'Belum ada deskripsi.' }}</p>
                    </div>

                    <!-- Tombol -->
                    <div class="mt-6 flex flex-wrap gap-4">
                        <a href="https://www.google.com/maps/dir/?api=1&destination={{ $cinema->latitude }},{{ $cinema->longitude }}"
                           target="_blank"
                           class="inline-block px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                            📍 Arahkan Saya ke Lokasi Ini
                        </a>

                        <a href="{{ route('cinema.index') }}"
                           class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            ← Kembali ke Daftar Bioskop
                        </a>
                    </div>
                </div>

                <!-- Peta -->
                <div>
                    <div id="map" class="w-full h-96 rounded-lg shadow-md"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([{{ $cinema->latitude }}, {{ $cinema->longitude }}], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        L.marker([{{ $cinema->latitude }}, {{ $cinema->longitude }}]).addTo(map)
            .bindPopup('<b>{{ $cinema->name }}</b><br>{{ $cinema->address }}').openPopup();
    </script>
@endsection
