<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Livewire;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource {
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form {
        return $form
            ->schema([
                Group::make([
                    Section::make('Main Data')->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                function (string $state, Set $set, String $operation) {
                                    if ($operation == 'create') {
                                        return $set('slug', str($state)->slug());
                                    }
                                }
                            ),
                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->unique(Product::class, 'slug', ignoreRecord: true),
                        MarkdownEditor::make('description')
                            ->columnSpanFull()
                            ->fileAttachmentsDirectory('products'),
                    ])->collapsible()->columns(2),
                ])->columnSpan(4),
                Group::make([
                    Section::make('Associations')
                        ->schema([
                            Select::make('category_id')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Select::make('brand_id')
                                ->relationship('brand', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                        ])
                        ->collapsible(),
                ])
                    ->columnSpan(2),
                Group::make([
                    Section::make('Product Information')
                        ->schema([
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->prefix('$')
                                ->columnSpanFull(),
                            Toggle::make('is_active')
                                ->default(true)
                                ->required(),
                            Toggle::make('is_featured')
                                ->required(),
                            Toggle::make('in_stock')
                                ->default(true)
                                ->required(),
                            Toggle::make('on_sale')
                                ->required(),
                        ])
                        ->collapsible()->columns(2)
                ])->columnSpan(3),
                Group::make([
                    Section::make('Images')
                        ->description('Upload up to five images')
                        ->schema([
                            FileUpload::make('images')
                                ->directory('products')
                                ->image()
                                ->multiple()
                                ->maxFiles(5)
                                ->reorderable(),
                        ])
                        ->collapsible(),
                ])->columnSpan(3),

            ])->columns(6);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                ImageColumn::make('images')
                    ->circular()
                    ->stacked(),
                TextColumn::make('name')
                    ->searchable()->wrap(),
                TextColumn::make('slug')
                    ->searchable()->wrap(),
                TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('brand.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('price')
                    ->money()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
                IconColumn::make('is_featured')
                    ->boolean(),
                IconColumn::make('in_stock')
                    ->boolean(),
                IconColumn::make('on_sale')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->multiple(),
                SelectFilter::make('brand')
                    ->relationship('brand', 'name')
                    ->searchable()
                    ->preload()
                    ->multiple(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
