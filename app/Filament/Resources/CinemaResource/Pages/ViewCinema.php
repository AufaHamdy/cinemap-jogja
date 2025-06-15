<?php
namespace App\Filament\Resources\CinemaResource\Pages;

use App\Filament\Resources\CinemaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\Grid;

class ViewCinema extends ViewRecord
{
    protected static string $resource = CinemaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Edit'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Bioskop')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                ImageEntry::make('image')
                                    ->label('Foto')
                                    ->height(200)
                                    ->defaultImageUrl('https://via.placeholder.com/400x300/3B82F6/FFFFFF?text=Cinema'),

                                Grid::make(1)
                                    ->schema([
                                        TextEntry::make('name')
                                            ->label('Nama Bioskop')
                                            ->size('lg')
                                            ->weight('bold'),

                                        TextEntry::make('address')
                                            ->label('Alamat'),

                                        IconEntry::make('is_active')
                                            ->label('Status')
                                            ->boolean()
                                            ->trueIcon('heroicon-o-check-circle')
                                            ->falseIcon('heroicon-o-x-circle')
                                            ->trueColor('success')
                                            ->falseColor('danger'),
                                    ]),

                                Grid::make(1)
                                    ->schema([
                                        TextEntry::make('phone')
                                            ->label('Telepon')
                                            ->copyable(),

                                        TextEntry::make('email')
                                            ->label('Email')
                                            ->copyable(),

                                        TextEntry::make('website')
                                            ->label('Website')
                                            ->url(fn ($state) => $state)
                                            ->openUrlInNewTab(),
                                    ]),
                            ]),
                    ]),

                Section::make('Lokasi & Rating')
                    ->schema([
                        Grid::make(4)
                            ->schema([
                                TextEntry::make('latitude')
                                    ->label('Latitude'),

                                TextEntry::make('longitude')
                                    ->label('Longitude'),

                                TextEntry::make('rating')
                                    ->label('Rating')
                                    ->formatStateUsing(fn (string $state): string => $state . ' ⭐'),

                                TextEntry::make('total_reviews')
                                    ->label('Total Review')
                                    ->suffix(' review'),
                            ]),
                    ]),

                Section::make('Detail Lainnya')
                    ->schema([
                        TextEntry::make('opening_hours')
                            ->label('Jam Operasional'),

                        TextEntry::make('description')
                            ->label('Deskripsi'),

                        TextEntry::make('facilities')
                            ->label('Fasilitas')
                            ->formatStateUsing(function ($state) {
                                if (!$state) return '-';
                                
                                $facilityLabels = [
                                    'parking' => 'Parkir',
                                    'food_court' => 'Food Court',
                                    'atm' => 'ATM',
                                    'wheelchair_access' => 'Akses Kursi Roda',
                                    'air_conditioning' => 'AC',
                                    'wifi' => 'WiFi Gratis',
                                    'dolby_atmos' => 'Dolby Atmos',
                                    'imax' => 'IMAX',
                                    '4dx' => '4DX',
                                    'premium_seats' => 'Kursi Premium',
                                    'online_booking' => 'Booking Online',
                                    'cashless_payment' => 'Pembayaran Cashless',
                                ];
                                
                                return collect($state)
                                    ->map(fn ($facility) => $facilityLabels[$facility] ?? $facility)
                                    ->join(', ');
                            }),
                    ]),
            ]);
    }
}