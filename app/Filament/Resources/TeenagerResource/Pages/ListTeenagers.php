<?php

namespace App\Filament\Resources\TeenagerResource\Pages;

use App\Filament\Resources\TeenagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeenagers extends ListRecords
{
    protected static string $resource = TeenagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
