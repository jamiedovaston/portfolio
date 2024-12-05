<?php

namespace App\Filament\Resources;

use App\Models\CustomLink;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\CustomLinkResource\Pages;
use Filament\Resources\Resource;

class CustomLinkResource extends Resource
{
    protected static ?string $model = CustomLink::class;

    // The navigation icon for this resource
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('project_id')
                    ->relationship('project', 'name') // Ensure CustomLink belongs to a Project
                    ->required()
                    ->label('Project'),
                Forms\Components\TextInput::make('icon')
                    ->required()->label('Icon'),
                Forms\Components\TextInput::make('name')
                    ->required()->label('Name'),
                Forms\Components\TextInput::make('link')
                    ->required()
                    ->url()->label('Link URL'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project.name')->label('Project'),
                Tables\Columns\TextColumn::make('icon')->label('Icon'),
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\TextColumn::make('link')->label('Link'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomLinks::route('/'),
            'create' => Pages\CreateCustomLink::route('/create'),
            'edit' => Pages\EditCustomLink::route('/{record}/edit'),
        ];
    }
}
