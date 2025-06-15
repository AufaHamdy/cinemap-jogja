<?php

namespace App\Filament\Resources\CinemaResource\Pages;

use App\Filament\Resources\CinemaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCinema extends EditRecord
{
    protected static string $resource = CinemaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()
                ->label('Lihat'),
            Actions\DeleteAction::make()
                ->label('Hapus'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data bioskop berhasil diperbarui!';
    }
}
