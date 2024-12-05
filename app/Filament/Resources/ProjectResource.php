<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Toggle::make('featured')->label('Featured'),
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\Textarea::make('description')->required(),
            Forms\Components\MarkdownEditor::make('body_text')->label('Body Text'),
            Forms\Components\TextInput::make('slug')
                ->unique()
                ->required(),
            Forms\Components\Select::make('code_lang_id')
                ->relationship('codeLang', 'name')
                ->required(),
            Forms\Components\TextInput::make('repo')->label('Repo (Optional)'),
            Forms\Components\TextInput::make('itch_page')->label('Itch Page (Optional)'),
            Forms\Components\Repeater::make('tags')
                ->schema([
                    Forms\Components\TextInput::make('tag'),
                ])
                ->label('Tags'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order') // Enable Drag-and-Drop for reordering
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('featured')->label('Featured'),
                Tables\Columns\TextColumn::make('codeLang.name')->label('Code Language'),
                Tables\Columns\TextColumn::make('order')->label('Order'),
            ])
            ->filters([]) // Add any filters if needed
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
