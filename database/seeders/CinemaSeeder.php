<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cinema;

class CinemaSeeder extends Seeder
{
    public function run()
    {
        $cinemas = [
            [
                'name' => 'Ambarrukmo XXI',
                'address' => 'Jl. Majapahit 102, 106 Yogyakarta 55101',
                'phone' => '(0274) 1234567',
                'email' => 'ambarrukmo@cinema21.com',
                'website' => 'https://www.cinema21.com',
                'latitude' => -7.782889,
                'longitude' => 110.367083,
                'opening_hours' => 'Senin-Minggu: 10:00 - 24:00',
                'description' => 'Bioskop premium dengan fasilitas lengkap dan teknologi terdepan. Menyajikan pengalaman menonton yang tak terlupakan.',
                'rating' => 4.5,
                'total_reviews' => 150,
                'facilities' => ['parking', 'food_court', 'atm', 'wheelchair_access', 'air_conditioning', 'wifi', 'dolby_atmos', 'premium_seats', 'online_booking', 'cashless_payment'],
                'is_active' => true,
            ],
            [
                'name' => 'Cinema 21 Malioboro',
                'address' => 'Jl. Malioboro No. 126, Yogyakarta',
                'phone' => '(0274) 1234568',
                'email' => 'malioboro@cinema21.com',
                'website' => 'https://www.cinema21.com',
                'latitude' => -7.797068,
                'longitude' => 110.370529,
                'opening_hours' => 'Senin-Minggu: 10:00 - 22:00',
                'description' => 'Lokasi strategis di jantung kota Yogyakarta. Mudah diakses dengan transportasi umum.',
                'rating' => 4.3,
                'total_reviews' => 89,
                'facilities' => ['parking', 'food_court', 'atm', 'air_conditioning', 'wifi', 'online_booking', 'cashless_payment'],
                'is_active' => true,
            ],
            [
                'name' => 'Empire XXI',
                'address' => 'Maluk Gudha No. 46, Yogyakarta 83516',
                'phone' => '(0274) 1234569',
                'email' => 'empire@cinema21.com',
                'website' => 'https://www.cinema21.com',
                'latitude' => -7.801389,
                'longitude' => 110.364583,
                'opening_hours' => 'Senin-Minggu: 09:00 - 23:00',
                'description' => 'Bioskop mewah dengan pengalaman menonton kelas premium. Dilengkapi dengan teknologi audiovisual terbaru.',
                'rating' => 4.7,
                'total_reviews' => 203,
                'facilities' => ['parking', 'food_court', 'atm', 'wheelchair_access', 'air_conditioning', 'wifi', 'dolby_atmos', 'imax', 'premium_seats', 'online_booking', 'cashless_payment'],
                'is_active' => true,
            ],
            [
                'name' => 'XXX XXI Jogja',
                'address' => 'Jatuhkarso Handana No. 2025, Yogyakarta',
                'phone' => '(0274) 1234570',
                'email' => 'xxx@cinema21.com',
                'website' => 'https://www.cinema21.com',
                'latitude' => -7.785068,
                'longitude' => 110.375529,
                'opening_hours' => 'Senin-Minggu: 10:00 - 24:00',
                'description' => 'Kompleks bioskop modern dengan berbagai pilihan studio dan fasilitas hiburan keluarga.',
                'rating' => 4.6,
                'total_reviews' => 342,
                'facilities' => ['parking', 'food_court', 'atm', 'wheelchair_access', 'air_conditioning', 'wifi', 'dolby_atmos', '4dx', 'premium_seats', 'online_booking', 'cashless_payment'],
                'is_active' => true,
            ],
        ];

        foreach ($cinemas as $cinema) {
            Cinema::create($cinema);
        }
    }
}