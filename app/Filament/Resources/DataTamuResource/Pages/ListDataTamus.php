<?php

namespace App\Filament\Resources\DataTamuResource\Pages;

use App\Filament\Resources\DataTamuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataTamus extends ListRecords
{
    protected static string $resource = DataTamuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
