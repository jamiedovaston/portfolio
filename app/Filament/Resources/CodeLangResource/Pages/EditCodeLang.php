<?php

namespace App\Filament\Resources\CodeLangResource\Pages;

use App\Filament\Resources\CodeLangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCodeLang extends EditRecord
{
    protected static string $resource = CodeLangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
