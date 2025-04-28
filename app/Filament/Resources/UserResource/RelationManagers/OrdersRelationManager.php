<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Helpers\pr;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Number;

class OrdersRelationManager extends RelationManager {
    protected static string $relationship = 'orders';

    public function form(Form $form): Form {
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
                Group::make([
                    Section::make('Add Porducts')
                        ->schema([
                            Repeater::make('item')
                                ->label('Products')
                                ->itemLabel('+ Product')
                                ->addActionLabel('Add Product')
                                ->defaultItems(1)
                                ->relationship('orderItems')
                                ->schema([
                                    Select::make('product_id')
                                        ->relationship('product', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->distinct()
                                        ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(
                                            function (?String $state, Set $set, Get $get) {
                                                $price = (float) Product::find($state)->price;
                                                $set('unit_amount', $price);
                                                $quantity = (int) $get('quantity');
                                                $set('total_amount', $price * $quantity);
                                            }
                                        ),
                                    TextInput::make('unit_amount')->numeric()
                                        ->disabled()
                                        ->dehydrated()
                                        ->required()
                                        ->numeric(),
                                    TextInput::make('quantity')->numeric()
                                        ->default(1)
                                        ->required()
                                        ->minValue(1)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(
                                            function (?String $state, Set $set, Get $get) {
                                                $productId = $get('product_id');
                                                $price = (float) Product::find($productId)?->price ?? 0;
                                                $quantity = (int) $state;
                                                $set('total_amount', $price * $quantity);
                                            }
                                        ),
                                    TextInput::make('total_amount')
                                        ->disabled()
                                        ->dehydrated()
                                        ->required()
                                        ->numeric(),
                                ])->columns(2)
                        ])
                        ->collapsible(),

                ])->columnSpanFull(),
                Placeholder::make('Grand Total')
                    ->content(function (Get $get, Set $set): string {
                        $items = collect($get('item'))->values();
                        $total = 0;
                        $items->each(function ($item) use (&$total) {
                            $total = $total + $item['total_amount'];
                        });
                        $set("grand_total", $total);
                        $set('grand_total_shipping', pr::log((float)$total + (float)$get('shipping_amount')));
                        return Number::currency($total, 'EGP');
                        // return '€' . number_format($get('cost') * $get('quantity'), 2);
                    })->columnSpanFull(),
                Hidden::make('grand_total'),
                // ->dehydrated()
                // ->disabled(),

                TextInput::make('shipping_amount')
                    ->default(0)
                    ->numeric()
                    ->live(onBlur: true)
                    ->afterStateUpdated(
                        function (?float $state, Set $set, Get $get) {
                            $state = $state ?? 0;
                            $set("grand_total_shipping", (float) $get("grand_total") + $state);
                        }
                    ),
                TextInput::make('grand_total_shipping')
                    ->label('Grand Total + Shipping')
                    ->disabled()
            ]);
    }

    public function table(Table $table): Table {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('grand_total')
                    ->numeric()
                    ->sortable()
                    ->money('EGP'),
                TextColumn::make('payment_method')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('payment_status')

                    ->searchable()
                    ->sortable(),
                SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'canceled' => 'Canceled'
                    ])->searchable(),
                TextColumn::make('currency')
                    ->searchable(),
                TextColumn::make('shipping_amount')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
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
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
