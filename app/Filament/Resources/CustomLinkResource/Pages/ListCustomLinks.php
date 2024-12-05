<?php

namespace App\Filament\Resources\CustomLinkResource\Pages;

use App\Filament\Resources\CustomLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomLinks extends ListRecords
{
    protected static string $resource = CustomLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
