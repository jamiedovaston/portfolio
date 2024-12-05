<?php

namespace App\Filament\Resources\CodeLangResource\Pages;

use App\Filament\Resources\CodeLangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCodeLangs extends ListRecords
{
    protected static string $resource = CodeLangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
