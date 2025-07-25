<?php

namespace App\Filament\Resources\DataTamuResource\Pages;

use App\Filament\Resources\DataTamuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataTamu extends EditRecord
{
    protected static string $resource = DataTamuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
