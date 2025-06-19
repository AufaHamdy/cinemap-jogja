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
        'latitude' => -7.782013432770412,
        'longitude' => 110.40133975027359,
        'opening_hours' => 'Senin–Minggu: 10:00 – 24:00',
        'description' => 'Bioskop premium di Plaza Ambarrukmo dengan fasilitas lengkap dan teknologi terkini.',
        'rating' => 4.5,
        'total_reviews' => 150,
        'facilities' => ['parking','food_court','atm','wheelchair_access','air_conditioning','wifi','dolby_atmos','premium_seats','online_booking','cashless_payment'],
        'is_active' => true,
    ],
    [
        'name' => 'Empire XXI',
        'address' => 'Maluk Gudha No. 46, Yogyakarta 83516',
        'phone' => '(0274) 1234569',
        'email' => 'empire@cinema21.com',
        'website' => 'https://www.cinema21.com',
        'latitude' => -7.7830871723306, 
        'longitude' =>  110.38678670044186,
        'opening_hours' => 'Senin–Minggu: 09:00 – 23:00',
        'description' => 'Bioskop mewah dengan teknologi audiovisual terbaru.',
        'rating' => 4.7,
        'total_reviews' => 203,
        'facilities' => ['parking','food_court','atm','wheelchair_access','air_conditioning','wifi','dolby_atmos','imax','premium_seats','online_booking','cashless_payment'],
        'is_active' => true,
    ],
    
    [
        'name' => 'Jogja City XXI',
        'address' => 'Jogja City Mall Lt.2, Jl. Magelang KM6 No.18 Sleman, Yogyakarta',
        'phone' => '(0274) 5306777',
        'email' => 'jogjacity@cinema21.com',
        'website' => 'https://www.cinema21.com',
        'latitude' => -7.753102484874826, 
        'longitude' =>  110.36148403172429,
        'opening_hours' => 'Senin–Minggu: 10:00 – 22:00',
        'description' => 'Bioskop modern di Jogja City Mall dengan akses parkir luas.',
        'rating' => 4.5,
        'total_reviews' => 380,
        'facilities' => ['parking','food_court','atm','wheelchair_access','air_conditioning','wifi','online_booking','cashless_payment'],
        'is_active' => true,
    ],
    [
        'name' => 'Sleman City Hall XXI',
        'address' => 'Sleman City Hall Lt.2, Jalan Gito Gati, Denggung, Sleman, Yogyakarta',
        'phone' => '(0274) 2920005',
        'email' => 'slemanhall@cinema21.com',
        'website' => 'https://www.cinema21.com',
        'latitude' => -7.72026914075336, 
        'longitude' => 110.36290667530292,
        'opening_hours' => 'Senin–Minggu: 10:00 – 22:00',
        'description' => 'Bioskop di pusat perbelanjaan Sleman City Hall, fasilitas modern.',
        'rating' => 4.5,
        'total_reviews' => 320,
        'facilities' => ['parking','food_court','atm','wheelchair_access','air_conditioning','wifi','online_booking','cashless_payment'],
        'is_active' => true,
    ],
    [
        'name' => 'Cinepolis Lippo Plaza Jogja',
        'address' => 'Lippo Plaza Jogja Lt.1-4, Jl. Adisucipto No.32-34 Gondokusuman, Yogyakarta',
        'phone' => '(0274) 4469999',
        'email' => 'lippo@cinepolis.co.id',
        'website' => 'https://www.cinepolis.co.id',
        'latitude' => -7.783968112622859, 
        'longitude' => 110.39082284020651,
        'opening_hours' => 'Senin–Minggu: 10:00 – 22:00',
        'description' => 'Bioskop Cinepolis di Lippo Plaza Jogja dengan fasilitas keluarga.',
        'rating' => 4.4,
        'total_reviews' => 310,
        'facilities' => ['parking','food_court','atm','wheelchair_access','air_conditioning','wifi','online_booking','cashless_payment'],
        'is_active' => true,
    ],
    [
        'name' => 'CGV Pakuwon Mall Jogja',
        'address' => 'Pakuwon Mall Lt.2, Ring Road Utara Condongcatur, Sleman, Yogyakarta',
        'phone' => '(0274) 2923089',
        'email' => 'pakuwon@cgv.id',
        'website' => 'https://www.cgv.id',
        'latitude' => -7.758649933005197, 
        'longitude' => 110.39930608253472,
        'opening_hours' => 'Senin–Minggu: 10:00 – 22:00',
        'description' => 'CGV Pakuwon Mall Jogja dengan fasilitas 4DX dan Sweetbox.',
        'rating' => 4.5,
        'total_reviews' => 400,
        'facilities' => ['parking','food_court','atm','wheelchair_access','air_conditioning','wifi','dolby_atmos','4dx','premium_seats','online_booking','cashless_payment'],
        'is_active' => true,
    ],
    [
        'name' => 'CGV J-Walk',
        'address' => 'Sahid J-Walk Lt.3, Jl. Babarsari No.2, Caturtunggal, Sleman, Yogyakarta',
        'phone' => '(0274) 2802285',
        'email' => 'jwalk@cgv.id',
        'website' => 'https://www.cgv.id',
        'latitude' => -7.77927383989994, 
        'longitude' => 110.41359282486339,
        'opening_hours' => 'Senin–Minggu: 10:00 – 22:00',
        'description' => 'CGV J-Walk Babarsari dengan fasilitas Sweetbox dan studio modern.',
        'rating' => 4.4,
        'total_reviews' => 290,
        'facilities' => ['parking','food_court','atm','wheelchair_access','air_conditioning','wifi','dolby_atmos','premium_seats','online_booking','cashless_payment'],
        'is_active' => true,
    ],
    [
        'name' => 'CGV Transmart Maguwo',
        'address' => 'Transmart Maguwo, Jl. Raya Solo KM 8 No.234, Maguwoharjo, Sleman, Yogyakarta',
        'phone' => '(0274) 2924000',
        'email' => 'transmartmaguwo@cgv.id',
        'website' => 'https://www.cgv.id',
        'latitude' => -7.782565942064574, 
        'longitude' => 110.4201279690423,
        'opening_hours' => 'Senin–Minggu: 10:00 – 22:00',
        'description' => 'CGV Transmart Maguwo dengan konsep Cultureplex.',
        'rating' => 4.3,
        'total_reviews' => 280,
        'facilities' => ['parking','food_court','atm','wheelchair_access','air_conditioning','wifi','dolby_atmos','premium_seats','online_booking','cashless_payment'],
        'is_active' => true,
    ],
        ];

        foreach ($cinemas as $cinema) {
            Cinema::create($cinema);
        }
    }
}