<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressRelationManager extends RelationManager {
    protected static string $relationship = 'address';

    public function form(Form $form): Form {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->maxLength(255),
                TextInput::make('phone')
                    ->tel()
                    ->maxLength(20),
                TextInput::make('city')
                    ->maxLength(255),
                TextInput::make('state')
                    ->maxLength(255),
                TextInput::make('country')
                    ->maxLength(50),
                TextInput::make('zip_code')
                    ->maxLength(10),
                Textarea::make('street_address')
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table {
        return $table
            ->recordTitleAttribute('street_address')
            ->columns([
                TextColumn::make('order.id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('fullname')
                    ->label('Full Name')
                    ->searchable(),
                // TextColumn::make('last_name')
                //     ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('street_address')
                    ->searchable(),
                TextColumn::make('city')
                    ->searchable(),
                TextColumn::make('state')
                    ->searchable(),
                TextColumn::make('country')
                    ->searchable(),
                TextColumn::make('zip_code')
                    ->searchable(),
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
