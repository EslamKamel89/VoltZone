<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource {
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'name';
    public static function getGloballySearchableAttributes(): array {
        return ['name', 'slug'];
    }
    public static function form(Form $form): Form {
        return $form
            ->schema([
                Section::make('Category')->schema([
                    Grid::make(4)->schema([
                        TextInput::make('name')
                            ->maxLength(255)
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn(string $operation,  string $state, Set $set) =>
                                $operation == 'create' ?  $set('slug',  str($state)->slug()) : null
                            )->columnSpan(2),
                        TextInput::make('slug')
                            ->maxLength(255)
                            ->unique('categories', 'slug', ignoreRecord: true)
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->columnSpan(2),
                        FileUpload::make('image')
                            ->directory('categories')
                            ->image()->columnSpan(3),
                        Group::make([
                            Toggle::make('is_active')->required()->default(true)
                        ])->extraAttributes([
                            'class' => 'flex items-center justify-center h-full ',
                        ])->columnSpan(1),
                    ])
                ])->description('Category Main Data')
                    ->collapsible()
                // ->extraAttributes([
                //     'class' => '!flex !items-center !justify-center h-full !bg-red-500',
                // ])
                // ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                ImageColumn::make('image'),
                IconColumn::make('is_active')
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
                //
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
