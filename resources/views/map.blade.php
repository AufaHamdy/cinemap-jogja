<!-- resources/views/map.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <button onclick="findNearby()" class="btn btn-primary mb-3">
        📍 Cari Bioskop Terdekat
    </button>

    <div id="map" style="height: 500px; border-radius: 10px; overflow: hidden;"></div>
</div>
@endsection

@section('scripts')
    <!-- Leaflet JS & CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const map = L.map('map').setView([-7.797068, 110.370529], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors',
            maxZoom: 19
        }).addTo(map);

        const cinemas = [
            { name: "Ambarrukmo XXI", lat: -7.782889, lng: 110.367083 },
            { name: "Cinema 21", lat: -7.797068, lng: 110.370529 },
            { name: "Empire XXI", lat: -7.801389, lng: 110.364583 },
            { name: "XXX XXI", lat: -7.785068, lng: 110.375529 }
        ];

        cinemas.forEach(c => {
            L.marker([c.lat, c.lng]).addTo(map)
                .bindPopup(`<b>${c.name}</b><br><button onclick="getDirections(${c.lat}, ${c.lng})">🧭 Arahkan</button>`);
        });

        window.cinemas = cinemas;
        window.mapInstance = map;
        window.currentRouting = null;
    });

    function getDirections(lat, lng) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(pos => {
                const userLat = pos.coords.latitude;
                const userLng = pos.coords.longitude;

                if (window.currentRouting) {
                    window.mapInstance.removeControl(window.currentRouting);
                }

                window.currentRouting = L.Routing.control({
                    waypoints: [
                        L.latLng(userLat, userLng),
                        L.latLng(lat, lng)
                    ],
                    routeWhileDragging: false,
                    createMarker: () => null,
                    lineOptions: { styles: [{ color: '#10b981', weight: 4 }] }
                }).addTo(window.mapInstance);

                window.mapInstance.fitBounds([
                    [userLat, userLng],
                    [lat, lng]
                ]);
            });
        } else {
            alert('Geolocation tidak didukung browser.');
        }
    }

    function findNearby() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(pos => {
                const uLat = pos.coords.latitude;
                const uLng = pos.coords.longitude;

                let nearest = window.cinemas[0];
                let min = getDistance(uLat, uLng, nearest.lat, nearest.lng);

                window.cinemas.forEach(c => {
                    const d = getDistance(uLat, uLng, c.lat, c.lng);
                    if (d < min) {
                        nearest = c;
                        min = d;
                    }
                });

                getDirections(nearest.lat, nearest.lng);
                alert(`Bioskop terdekat: ${nearest.name} (~${min.toFixed(2)} km)`);
            });
        }
    }

    function getDistance(lat1, lng1, lat2, lng2) {
        const R = 6371;
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLng = (lng2 - lng1) * Math.PI / 180;
        const a = Math.sin(dLat/2)**2 + Math.cos(lat1*Math.PI/180)*Math.cos(lat2*Math.PI/180)*Math.sin(dLng/2)**2;
        return R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    }
    </script>
@endsection
