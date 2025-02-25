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
use Filament\Forms\Components\ColorPicker;

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
                                        ])
                                        ->columns(1),
                                    Builder\Block::make('subheading')
                                        ->schema([
                                            TextInput::make('content')
                                                ->label('Subheading')
                                                ->required(),
                                        ])
                                        ->columns(1),
                                    Builder\Block::make('Divider')
                                        ->schema([
                                        ])
                                        ->columns(1),
                                    Builder\Block::make('Github Repo')
                                        ->schema([
                                            TextInput::make('content')
                                                ->label('Link')
                                                ->required(),
                                        ])
                                        ->columns(1),
                                    Builder\Block::make('Youtube Embed')
                                        ->schema([
                                            TextInput::make('content')
                                                ->label('embed')
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
                                    Builder\Block::make('paragraph and image')
                                        ->schema([
                                            FileUpload::make('url')
                                                ->label('Image')
                                                ->image()
                                                ->required(),
                                            Select::make('Image Location')
                                                ->options([
                                                    'right' => 'right',
                                                    'left' => 'left',
                                                ]),
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
                                                ->required()
                                        ->columns(1),
                                        ]),
                                    Builder\Block::make('Multiple Images')
                                        ->schema([
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
                                        ]),
                                    Builder\Block::make('Multiple Images with Description')
                                        ->schema([
                                            Repeater::make('images')
                                                ->label('Project Images')
                                                ->schema([
                                                    TextInput::make('content')
                                                        ->label('Description')
                                                        ->required(),
                                                    FileUpload::make('url')
                                                        ->label('Image URL')
                                                        ->directory('projects/images') // Correct usage here
                                                        ->image()
                                                        ->required(),
                                                ])
                                                ->minItems(1), // Ensure at least one image is added
                                        ]),
                                    Builder\Block::make('Single Image')
                                        ->schema([
                                            FileUpload::make('url')
                                                ->label('Image')
                                                ->image()
                                                ->required(),
                                        ]),
                                ])
                        ]),
                    Wizard\Step::make('Design')
                        ->schema([
                            ColorPicker::make('pbcs')
                                ->label('Project Background Color Secondary'),
                            ColorPicker::make('pbcp')
                                ->label('Project Background Color Primary'),
                            ColorPicker::make('plgc1')
                                ->label('Project Logo Gradient Color 1'),
                            ColorPicker::make('plgc2')
                                ->label('Project Logo Gradient Color 2'),
                        ]),
                ])->columnSpanFull(),

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
