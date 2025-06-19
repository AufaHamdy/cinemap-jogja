<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEMAP JOGJA - Temukan Bioskop Terdekat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        * { font-family: 'Inter', sans-serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .cinema-card {
            transition: all 0.3s ease;
        }
        .cinema-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .pulse-dot {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass-effect">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-map-marker-alt text-white text-sm"></i>
                    </div>
                    <h1 class="text-xl font-bold text-gray-800">CINEMAP JOGJA</h1>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors">Beranda</a>
                    <a href="#peta" class="text-gray-700 hover:text-blue-600 transition-colors">Peta</a>
                    <a href="#daftar" class="text-gray-700 hover:text-blue-600 transition-colors">Daftar Bioskop</a>
                    <a href="#tentang" class="text-gray-700 hover:text-blue-600 transition-colors">Tentang</a>
                    <a href="#kontak" class="text-gray-700 hover:text-blue-600 transition-colors">Kontak</a>
                </div>
                <button class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient pt-24 pb-16 text-white overflow-hidden relative">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="space-y-4">
                        <h1 class="text-5xl font-bold leading-tight">
                            Temukan Bioskop<br>
                            <span class="text-yellow-300">Terdekat di Yogyakarta</span>
                        </h1>
                        <p class="text-xl text-gray-200 leading-relaxed">
                            Dilengkapi dengan fitur pencarian rute<br>
                            terpercaya dan informasi lengkap
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <button onclick="scrollToMap()" class="bg-blue-600 hover:bg-blue-700 px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-map-marked-alt mr-2"></i>
                            Lihat Peta Sekarang
                        </button>
                        <button class="glass-effect px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:bg-white hover:text-gray-800">
                            <i class="fas fa-play mr-2"></i>
                            Tutorial
                        </button>
                    </div>
                </div>
                {{-- <div class="relative">
                    <div class="bg-white rounded-2xl shadow-2xl p-6 relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-gray-800 font-semibold">Cinema 21</h3>
                            <span class="pulse-dot w-3 h-3 bg-green-500 rounded-full"></span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">📍 Malioboro N3, 126, Yogyakarta</p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>⏰ Senin • Minggu 10:00 - 22:00</span>
                        </div>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>📞 (0274) 1234567</span>
                        </div>
                        <button onclick="scrollToMap()" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            🧭 Arahkan Saya ke Sini
                        </button>
                    </div>
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-yellow-300 rounded-full opacity-20"></div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-blue-300 rounded-full opacity-30"></div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center space-y-4 p-6 rounded-xl hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-search-location text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Pencarian Lokasi</h3>
                    <p class="text-gray-600">Temukan bioskop terdekat dengan pencarian otomatis berdasarkan lokasi Anda</p>
                </div>
                <div class="text-center space-y-4 p-6 rounded-xl hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-route text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Pathfinding</h3>
                    <p class="text-gray-600">Dapatkan rute tercepat dan terbaik menuju bioskop pilihan Anda dengan navigasi real-time</p>
                </div>
                <div class="text-center space-y-4 p-6 rounded-xl hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-info-circle text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Info Bioskop</h3>
                    <p class="text-gray-600">Informasi lengkap jam operasional, kontak, dan fasilitas setiap bioskop</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section id="peta" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Peta Bioskop Yogyakarta</h2>
                <p class="text-xl text-gray-600">Temukan lokasi bioskop favorit Anda</p>
            </div>
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div id="map" class="h-96 w-full relative">
                    <div class="absolute inset-0 flex items-center justify-center bg-gray-100">
                        <div class="text-center">
                            <i class="fas fa-map text-4xl text-gray-400 mb-4"></i>
                            <p class="text-gray-600">Peta akan dimuat di sini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cinema List Section -->
    <section id="daftar" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-2">Daftar Bioskop</h2>
                    <p class="text-gray-600"> Pilihan bioskop terbaik di Yogyakarta</p>
                </div>
                <button onclick="findNearby()" class="bg-blue-600 text-white px-4 py-2 rounded-lg mb-4 hover:bg-blue-700">
                    Cari Bioskop Terdekat
                </button>
                @if (isset($lat) && isset($lng))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                Menampilkan hasil berdasarkan lokasi Anda (Lat: {{ $lat }}, Lng: {{ $lng }}).
            </div>
        @endif
                <div class="relative">
                    <input type="text" placeholder="Cari lokasi bioskop..." class="pl-12 pr-4 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 w-80">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="grid lg:grid-cols-2 gap-8">
    @foreach ($cinemas as $cinema)
        <div class="cinema-card bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Bagian gambar gradient atau background gambar -->
            <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 relative">
                <div class="absolute inset-0 bg-black opacity-20"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-2xl font-bold">{{ $cinema->name }}</h3>
                    <p class="text-blue-100">{{ $cinema->description ?? 'No description' }}</p>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-3 mb-6">
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-map-marker-alt w-5 text-blue-600"></i>
                        <span class="ml-3">{{ $cinema->address }}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-clock w-5 text-green-600"></i>
                        <span class="ml-3">{{ $cinema->opening_hours }}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-star w-5 text-yellow-500"></i>
                        <span class="ml-3">{{ $cinema->rating ?? '0' }} • {{ $cinema->total_reviews ?? '0' }} ulasan</span>
                    </div>
                </div>
                <a href="{{ route('cinema.show', $cinema->id) }}" class="w-full block bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-semibold transition-colors text-center">
                    <i class="fas fa-eye mr-2"></i>
                    Lihat Detail
                </a>
            </div>
        </div>
    @endforeach
</div>

           

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <div class="flex space-x-2">
                    @for ($i = 1; $i <= $cinemas->lastPage(); $i++)
                        <a href="{{ $cinemas->url($i) }}"
                        class="w-10 h-10 flex items-center justify-center rounded-lg font-semibold
                            {{ $cinemas->currentPage() == $i ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    {{-- Tombol Next --}}
                    @if ($cinemas->hasMorePages())
                        <a href="{{ $cinemas->nextPageUrl() }}"
                        class="w-10 h-10 flex items-center justify-center rounded-lg font-semibold bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">
                            &gt;
                        </a>
                    @endif
                </div>
            </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="w-24 h-24 bg-blue-600 rounded-2xl flex items-center justify-center mb-8 relative">
                        <i class="fas fa-map-marked-alt text-white text-3xl"></i>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-film text-white text-sm"></i>
                        </div>
                    </div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">
                        CINEMAP<br>
                        <span class="text-blue-600">JOGUAP JOGJA</span>
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Geografik, novagasi JOGJA dunia program (GIS) 
                        art kalo katogeras, pemberibisagsa Geografian
                        dengan Pathfinding.
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Tentang JOGGIJASP, Jogja penyelenggara Progoveta
                        dan Geografis informageo yang tentang Jogja.
                    </p>
                </div>
                <div class="relative">
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Tentang CINEMAP JOGJA</h3>
                        <p class="text-gray-600 mb-6">
                            CINEMAP JOGJA menyatukan program informasi bioskop dengan teknologi GIS untuk memberikan pengalaman terbaik dalam menemukan bioskop di Yogyakarta.
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Program terintegrasi dengan data lokasi real-time</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Navigasi dengan algoritma pathfinding terdepan</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-purple-600 rounded-full mr-3"></div>
                                <span class="text-gray-700">Interface yang mudah digunakan dan responsif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Contact Section -->
<section id="kontak" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Kontak Kami</h2>
                <p class="text-xl text-gray-600">Ada pertanyaan? Hubungi tim CINEMAP JOGJA</p>
            </div>

            <!-- Grid dua kolom -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Kolom Formulir -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Pesan</h3>

                    {{-- Notifikasi sukses --}}
                    @if(session('success'))
                        <div class="p-4 mb-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Tampilkan error validasi --}}
                    @if ($errors->any())
                        <div class="p-4 mb-4 bg-red-100 text-red-800 rounded">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Masukkan nama Anda">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="nama@email.com">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Subjek</label>
                            <input type="text" name="subject" value="{{ old('subject') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Subjek pesan">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Pesan</label>
                            <textarea rows="4" name="message"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Tulis pesan Anda...">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-lg font-semibold transition-colors">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                <!-- Kolom Informasi Kontak -->
                <div class="space-y-8">
                    <div class="bg-blue-50 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Email</h4>
                        <p class="text-gray-600">info@cinemapjogja.com</p>
                    </div>
                    <div class="bg-green-50 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Telepon</h4>
                        <p class="text-gray-600">+62 274 123 4567</p>
                    </div>
                    <div class="bg-purple-50 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Alamat</h4>
                        <p class="text-gray-600">Jl. Malioboro No. 123<br>Yogyakarta, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-white text-sm"></i>
                        </div>
                        <h3 class="text-xl font-bold">CINEMAP JOGJA</h3>
                    </div>
                    <p class="text-gray-400">Platform terpercaya untuk menemukan bioskop terbaik di Yogyakarta dengan teknologi navigasi modern.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Menu</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#peta" class="hover:text-white transition-colors">Peta</a></li>
                        <li><a href="#daftar" class="hover:text-white transition-colors">Daftar Bioskop</a></li>
                        <li><a href="#tentang" class="hover:text-white transition-colors">Tentang</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Bantuan</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Panduan</a></li>
                        <li><a href="#kontak" class="hover:text-white transition-colors">Kontak</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Lapor Bug</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-400 rounded-lg flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-pink-600 rounded-lg flex items-center justify-center hover:bg-pink-700 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center hover:bg-red-700 transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 CINEMAP JOGJA. All rights reserved. Made with ❤️ in Yogyakarta</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

<script>
    // Smooth scrolling ke elemen peta (ID-nya harus 'map' biar sama)
    function scrollToMap() {
        document.getElementById('map').scrollIntoView({
            behavior: 'smooth'
        });
    }

    // Fungsi cari bioskop terdekat (redirect ke route atau bisa langsung routing)
    function findNearby() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                // ✅ Redirect ke route nearby
                window.location.href = `/nearby?lat=${lat}&lng=${lng}`;
            }, function () {
                alert('Gagal mendeteksi lokasi Anda.');
            });
        } else {
            alert('Browser tidak mendukung Geolocation.');
        }
    }

    // Inisialisasi peta
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([-7.797068, 110.370529], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors',
            maxZoom: 19
        }).addTo(map);

        var cinemas = [
            {
                name: "Ambarrukmo XXI",
                address: "Jl. Majapahit 102, 106 Yogyakarta 55101",
                lat: -7.782013432770412,
                lng: 110.40133975027359,
                hours: "10:00 - 24:00",
                phone: "(0274) 1234567"
            },
            {
                name: "Empire XXI",
                address: "Maluk Gudha No. 46, Yogyakarta 83516",
                lat: -7.7830871723306, 
                lng: 110.38678670044186,
                hours: "09:00 - 23:00",
                phone: "(0274) 1234569"
            },
           
            {
                name: "Jogja City XXI",
                address: "Jogja City Mall Lt. 2, Jl. Magelang KM 6 No. 18, Sleman, Yogyakarta",
                lat: -7.753102484874826, 
                lng: 110.36148403172429,
                hours: "10:00 - 22:00",
                phone: "(0274) 5306777"
            },
            {
                name: "Sleman City Hall XXI",
                address: "Sleman City Hall Lt. 2, Jalan Gito Gati, Denggung, Sleman, Yogyakarta",
                lat: -7.72026914075336, 
                lng: 110.36290667530292,
                hours: "10:00 - 22:00",
                phone: "(0274) 2920005"
            },
            {
                name: "Cinepolis Lippo Plaza Jogja",
                address: "Lippo Plaza Jogja Lt. 1 & 4, Jl. Adisucipto No. 32-34, Gondokusuman, Yogyakarta",
                lat: -7.783968112622859, 
                lng: 110.39082284020651,
                hours: "10:00 - 22:00",
                phone: "(0274) 4469999"
            },
            {
                name: "CGV Pakuwon Mall Jogja",
                address: "Pakuwon Mall Lt. 2, Ring Road Utara, Condongcatur, Sleman, Yogyakarta",
                lat: -7.758649933005197, 
                lng: 110.39930608253472,
                hours: "10:00 - 22:00",
                phone: "(0274) 2923089"
            },
            {
                name: "CGV J-Walk",
                address: "Sahid J-Walk Lt. 3, Jl. Babarsari No. 2, Caturtunggal, Sleman, Yogyakarta",
                lat: -7.77927383989994, 
                lng: 110.41359282486339,
                hours: "10:00 - 22:00",
                phone: "(0274) 2802285"
            },
            {
                name: "CGV Transmart Maguwo",
                address: "Transmart Maguwo, Jl. Raya Solo KM 8 No. 234, Maguwoharjo, Sleman, Yogyakarta",
                lat: -7.782565942064574, 
                lng: 110.4201279690423,
                hours: "10:00 - 22:00",
                phone: "(0274) 2924000"
            }
        ];

        cinemas.forEach(function (cinema) {
            var marker = L.marker([cinema.lat, cinema.lng]).addTo(map);
            var popupContent = `
                <div class="p-2">
                    <h3 class="font-bold text-lg text-gray-800 mb-2">${cinema.name}</h3>
                    <p class="text-sm text-gray-600 mb-1">📍 ${cinema.address}</p>
                    <p class="text-sm text-gray-600 mb-1">⏰ ${cinema.hours}</p>
                    <p class="text-sm text-gray-600 mb-3">📞 ${cinema.phone}</p>
                    <button onclick="getDirections(${cinema.lat}, ${cinema.lng})"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors">
                        🧭 Arahkan ke Sini
                    </button>
                </div>
            `;
            marker.bindPopup(popupContent);
        });

        window.cinemas = cinemas; // simpan global untuk findNearby
        window.mapInstance = map;
        window.currentRouting = null;
    });

    // Fungsi arahkan user ke bioskop tertentu
    function getDirections(lat, lng) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var userLat = position.coords.latitude;
                var userLng = position.coords.longitude;

                if (window.currentRouting) {
                    window.mapInstance.removeControl(window.currentRouting);
                }

                window.currentRouting = L.Routing.control({
                    waypoints: [
                        L.latLng(userLat, userLng),
                        L.latLng(lat, lng)
                    ],
                    routeWhileDragging: false,
                    createMarker: function () { return null; },
                    lineOptions: {
                        styles: [{ color: '#10b981', weight: 4, opacity: 0.8 }]
                    }
                }).addTo(window.mapInstance);

                window.mapInstance.fitBounds([
                    [userLat, userLng],
                    [lat, lng]
                ]);

            }, function () {
                alert('Tidak dapat mengakses lokasi Anda.');
            });
        } else {
            alert('Geolocation tidak didukung oleh browser ini.');
        }
    }

    // Fungsi cari bioskop terdekat & rute otomatis
    function getNearestCinema(userLat, userLng) {
        var nearest = null;
        var minDist = Infinity;

        window.cinemas.forEach(function (cinema) {
            var dist = Math.sqrt(
                Math.pow(cinema.lat - userLat, 2) +
                Math.pow(cinema.lng - userLng, 2)
            );
            if (dist < minDist) {
                minDist = dist;
                nearest = cinema;
            }
        });

        if (nearest) {
            getDirections(nearest.lat, nearest.lng);
        } else {
            alert("Bioskop terdekat tidak ditemukan.");
        }
    }
</script>
<script>
            // Add markers for each cinema
            cinemas.forEach(function(cinema, index) {
                var marker = L.marker([cinema.lat, cinema.lng]).addTo(map);
                
                var popupContent = `
                    <div class="p-2">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">${cinema.name}</h3>
                        <p class="text-sm text-gray-600 mb-1">📍 ${cinema.address}</p>
                        <p class="text-sm text-gray-600 mb-1">⏰ ${cinema.hours}</p>
                        <p class="text-sm text-gray-600 mb-3">📞 ${cinema.phone}</p>
                        <button onclick="getDirections(${cinema.lat}, ${cinema.lng})" 
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors">
                            🧭 Arahkan ke Sini
                        </button>
                    </div>
                `;
                
                marker.bindPopup(popupContent);
            });

       

            {{-- // Store routing control globally for direction function --}}
            window.currentRouting = null;
            window.mapInstance = map;
        });

        {{-- Function to get directions to a specific cinema --}}
        function getDirections(lat, lng) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLat = position.coords.latitude;
                    var userLng = position.coords.longitude;
                    
                    // Remove existing routing
                    if (window.currentRouting) {
                        window.mapInstance.removeControl(window.currentRouting);
                    }
                    
                    // Add new routing
                    window.currentRouting = L.Routing.control({
                        waypoints: [
                            L.latLng(userLat, userLng),
                            L.latLng(lat, lng)
                        ],
                        routeWhileDragging: true,
                        createMarker: function() { return null; },
                        lineOptions: {
                            styles: [{ color: '#10b981', weight: 4, opacity: 0.8 }]
                        }
                    }).addTo(window.mapInstance);
                    
                    // Center map on route
                    window.mapInstance.fitBounds([
                        [userLat, userLng],
                        [lat, lng]
                    ]);
                    
                }, function() {
                    alert('Tidak dapat mengakses lokasi Anda. Silakan aktifkan GPS.');
                });
            } else {
                alert('Geolocation tidak didukung oleh browser ini.');
            }
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.md\\:hidden');
        const mobileMenu = document.createElement('div');
        mobileMenu.className = 'hidden md:hidden bg-white shadow-lg absolute top-full left-0 right-0 z-40';
        mobileMenu.innerHTML = `
            <div class="px-4 py-4 space-y-4">
                <a href="#" class="block text-gray-700 hover:text-blue-600 transition-colors">Beranda</a>
                <a href="#peta" class="block text-gray-700 hover:text-blue-600 transition-colors">Peta</a>
                <a href="#daftar" class="block text-gray-700 hover:text-blue-600 transition-colors">Daftar Bioskop</a>
                <a href="#tentang" class="block text-gray-700 hover:text-blue-600 transition-colors">Tentang</a>
                <a href="#kontak" class="block text-gray-700 hover:text-blue-600 transition-colors">Kontak</a>
            </div>
        `;
        
        mobileMenuBtn.parentNode.appendChild(mobileMenu);
        
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Search functionality
        const searchInput = document.querySelector('input[placeholder="Cari lokasi bioskop..."]');
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const cinemaCards = document.querySelectorAll('.cinema-card');
                
                cinemaCards.forEach(card => {
                    const cinemaName = card.querySelector('h3').textContent.toLowerCase();
                    const cinemaAddress = card.querySelector('.fa-map-marker-alt').nextElementSibling.textContent.toLowerCase();
                    
                    if (cinemaName.includes(searchTerm) || cinemaAddress.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = searchTerm === '' ? 'block' : 'none';
                    }
                });
            });
        }

        // Add loading animation for map
        const mapContainer = document.getElementById('map');
        const mapPlaceholder = mapContainer.querySelector('.absolute');
        
        // Remove placeholder after map loads
        setTimeout(() => {
            if (mapPlaceholder) {
                mapPlaceholder.style.display = 'none';
            }
        }, 2000);

        // Form submission handler
        const contactForm = document.querySelector('form');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form data
                const formData = new FormData(this);
                const name = this.querySelector('input[placeholder="Masukkan nama Anda"]').value;
                const email = this.querySelector('input[placeholder="nama@email.com"]').value;
                const subject = this.querySelector('input[placeholder="Subjek pesan"]').value;
                const message = this.querySelector('textarea').value;
                
                // Simple validation
                if (!name || !email || !subject || !message) {
                    alert('Mohon lengkapi semua field!');
                    return;
                }
                
                // Simulate form submission
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
                submitBtn.disabled = true;
                
                setTimeout(() => {
                    alert('Pesan berhasil dikirim! Terima kasih.');
                    this.reset();
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        }

        // Add scroll-triggered animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe cinema cards for scroll animations
        document.querySelectorAll('.cinema-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(20px)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.1)';
                navbar.style.backdropFilter = 'blur(10px)';
            }
        });
    </script>
</body>
</html>