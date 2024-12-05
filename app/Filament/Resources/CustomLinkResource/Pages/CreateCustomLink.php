<?php

namespace App\Filament\Resources\CustomLinkResource\Pages;

use App\Filament\Resources\CustomLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomLink extends CreateRecord
{
    protected static string $resource = CustomLinkResource::class;
}
