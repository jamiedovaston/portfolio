<?php

namespace App\Filament\Resources\CustomLinkResource\Pages;

use App\Filament\Resources\CustomLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomLink extends EditRecord
{
    protected static string $resource = CustomLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
