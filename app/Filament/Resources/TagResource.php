<?php

namespace App\Filament\Resources;

use App\Models\Tag;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\form;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\TagResource\Pages;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Project Management';
    protected static ?string $navigationLabel = 'Tags';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Tag Name')
                    ->required()
                    ->placeholder('Enter tag name'),

                FileUpload::make('image')
                    ->label('Tag Image')
                    ->directory('tags')
                    ->image()
                    ->required(),

                ColorPicker::make('primary_colour')
                    ->label('Primary Color')
                    ->required()
                    ->placeholder('#000000'),

                ColorPicker::make('secondary_colour')
                    ->label('Secondary Color')
                    ->required()
                    ->placeholder('#FFFFFF'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Tag Name'),
                ImageColumn::make('image')
                    ->label('Tag Icon'),
                TextColumn::make('primary_colour')
                    ->label('Primary Color'),
                TextColumn::make('secondary_colour')
                    ->label('Secondary Color'),
            ])
            ->filters([]) // Add filters if necessary
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
