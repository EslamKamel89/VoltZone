<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Helpers\pr;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
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
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Number;

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
