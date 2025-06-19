<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEMAP JOGJA - Temukan Bioskop Terdekat</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Leaflet untuk Peta -->
    //<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Google Font -->
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
                    <a href="/" class="text-gray-700 hover:text-blue-600 transition-colors">Beranda</a>
                    <a href="/#peta" class="text-gray-700 hover:text-blue-600 transition-colors">Peta</a>
                    <a href="/#daftar" class="text-gray-700 hover:text-blue-600 transition-colors">Daftar Bioskop</a>
                    <a href="/#tentang" class="text-gray-700 hover:text-blue-600 transition-colors">Tentang</a>
                    <a href="/#kontak" class="text-gray-700 hover:text-blue-600 transition-colors">Kontak</a>
                </div>
                <button class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="pt-24 container mx-auto px-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-6 mt-12 text-center">
        &copy; {{ date('Y') }} CINEMAP JOGJA - Temukan Bioskop Terdekat
    </footer>

</body>
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

    <!-- Scripts -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script>
        // Smooth scrolling function
        function scrollToMap() {
            document.getElementById('peta').scrollIntoView({ 
                behavior: 'smooth' 
            });
        }

        // Initialize map when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Leaflet map
            var map = L.map('map').setView([-7.797068, 110.370529], 13);

            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);

            // Sample cinema data
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

           
            window.currentRouting = null;
            window.mapInstance = map;
        });

        // Function to get directions to a specific cinema
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
