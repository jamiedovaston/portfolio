<?php

namespace App\Filament\Resources;

use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;
use Filament\Tables\Table;
use Filament\Forms\form;
use App\Filament\Resources\ProjectResource\Pages;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Builder;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Portfolio Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Details')
                        ->schema([
                            TextInput::make('title')
                                ->label('Title')
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state)))
                                ->placeholder('Enter project title'),
                            Textarea::make('description')
                                ->label('Description')
                                ->required()
                                ->rows(3)
                                ->placeholder('Enter a brief description of the project'),
                            FileUpload::make('background_image')
                                ->label('Project Image')
                                ->directory('projects/backgrounds')
                                ->image(),
                        ]),
                    Wizard\Step::make('Project')
                        ->schema([
                            Builder::make('content')
                                ->blocks([
                                    Builder\Block::make('heading')
                                        ->schema([
                                            TextInput::make('content')
                                                ->label('Heading')
                                                ->required(),
                                            TextInput::make('content')
                                                ->label('Subheading')
                                                ->required(),
                                        ])
                                        ->columns(1),
                                    Builder\Block::make('paragraph')
                                        ->schema([
                                            RichEditor::make('content')
                                                ->toolbarButtons([
                                                    'attachFiles',
                                                    'blockquote',
                                                    'bold',
                                                    'bulletList',
                                                    'codeBlock',
                                                    'h2',
                                                    'h3',
                                                    'italic',
                                                    'link',
                                                    'orderedList',
                                                    'redo',
                                                    'strike',
                                                    'underline',
                                                    'undo',
                                                ])
                                                ->label('Paragraph')
                                                ->required(),
                                        ]),
                                    Builder\Block::make('paragraph')
                                        ->schema([
                                            RichEditor::make('content')
                                                ->toolbarButtons([
                                                    'attachFiles',
                                                    'blockquote',
                                                    'bold',
                                                    'bulletList',
                                                    'codeBlock',
                                                    'h2',
                                                    'h3',
                                                    'italic',
                                                    'link',
                                                    'orderedList',
                                                    'redo',
                                                    'strike',
                                                    'underline',
                                                    'undo',
                                                ])
                                                ->label('Paragraph')
                                                ->required(),
                                        ]),
                                    Builder\Block::make('image')
                                        ->schema([
                                            FileUpload::make('url')
                                                ->label('Image')
                                                ->image()
                                                ->required(),
                                            TextInput::make('alt')
                                                ->label('Alt text')
                                                ->required(),
                                        ]),
                                ])
                        ]),
                    Wizard\Step::make('Design')
                        ->schema([
                            // ...
                        ]),
                ]),




                Repeater::make('images')
                    ->label('Project Images')
                    ->schema([
                        FileUpload::make('url')
                            ->label('Image URL')
                            ->directory('projects/images') // Correct usage here
                            ->image()
                            ->required(),
                    ])
                    ->minItems(1), // Ensure at least one image is added

                RichEditor::make('body')
                    ->label('Detailed Content')
                    ->placeholder('Enter detailed content about the project...'),

                Repeater::make('links')
                    ->label('Project Links')
                    ->schema([
                        TextInput::make('url')
                            ->label('Link URL')
                            ->required()
                            ->placeholder('Enter the URL'),
                        TextInput::make('icon')
                            ->label('Boxicon Class')
                            ->required()
                            ->placeholder('Enter Boxicon class (e.g., bx-link-alt)'),
                    ])
                    ->minItems(0)
                    ->collapsed(),

                Select::make('tags')
                    ->label('Tags')
                    ->multiple()
                    ->relationship('tags', 'name')
                    ->preload(),

                Select::make('categories')
                    ->label('Categories')
                    ->multiple()
                    ->relationship('categories', 'name')
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('position')
            ->columns([
                ImageColumn::make('background_image')->label('Thumbnail'),
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(100)
                    ->wrap(),
                TextColumn::make('categories.name')
                    ->label('Categories')
                    ->wrap(),
                TextColumn::make('tags.name')
                    ->label('Tags')
                    ->wrap(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->date(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->filters([]); // Add filters if necessary later
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
