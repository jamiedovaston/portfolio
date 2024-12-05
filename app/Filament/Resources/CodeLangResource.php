<?php

namespace App\Filament\Resources;

use App\Models\CodeLang;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\CodeLangResource\Pages;

class CodeLangResource extends Resource
{
    protected static ?string $model = CodeLang::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->unique(),
            Forms\Components\TextInput::make('slug')->required()->unique(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('slug'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCodeLangs::route('/'),
            'create' => Pages\CreateCodeLang::route('/create'),
            'edit' => Pages\EditCodeLang::route('/{record}/edit'),
        ];
    }
}
