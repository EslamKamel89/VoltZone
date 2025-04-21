<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;

class OrderResource extends Resource {
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form {
        return $form
            ->schema([
                Group::make([
                    Section::make('Order Information')
                        ->schema([

                            Select::make('user_id')
                                ->label('Customer')
                                ->relationship('user', 'name')
                                ->required()
                                ->searchable()
                                ->preload(),
                            Select::make('payment_method')
                                ->label("Payment Mehtod")
                                ->options([
                                    "stripe" => 'Stripe',
                                    'cod' => 'Cash On Delivery',
                                ])->required(),
                            Select::make('payment_status')
                                ->label("Payment Status")
                                ->options([
                                    "pending" => 'Pending',
                                    'paid' => 'Paid',
                                    'failed' => 'Failed',
                                ])->default('pending')
                                ->required(),
                            ToggleButtons::make('status')
                                ->options([
                                    'new' => 'New',
                                    'processing' => 'Processing',
                                    'shipped' => 'Shipped',
                                    'delivered' => 'Delivered',
                                    'canceled' => 'Canceled'
                                ])
                                ->colors([
                                    'new' => "info",
                                    'processing' => 'warning',
                                    'shipped' => 'success',
                                    'delivered' => 'success',
                                    'canceled' => 'danger'
                                ])
                                ->icons([
                                    'new' => "heroicon-m-sparkles",
                                    'processing' => "heroicon-m-arrow-path",
                                    'shipped' => "heroicon-m-truck",
                                    'delivered' => "heroicon-m-check-badge",
                                    'canceled' => "heroicon-m-x-circle"
                                ])
                                ->inline()->default('new'),
                            Select::make('currency')
                                ->options([
                                    'usd' => 'USD',
                                    'egp' => 'EGP',
                                    'eur' => 'EUR',
                                    'gbp' => 'GBP',
                                ])->default('egp'),
                            Select::make('shipping_method')
                                ->options([
                                    'fedex' => 'FedExl',
                                    'ups' => 'UPS',
                                    'dhl' => 'DHL',
                                ])->required()->default('dhl'),
                            Textarea::make('notes')
                                ->columnSpanFull(),
                        ])->collapsible()->columns(2),
                ])->columnSpanFull(),
                TextInput::make('grand_total')
                    ->numeric(),

                TextInput::make('shipping_amount')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('grand_total')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->searchable(),
                TextColumn::make('payment_status')
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('currency')
                    ->searchable(),
                TextColumn::make('shipping_amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('shipping_method')
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
            ->actions([
                ActionGroup::make([

                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
