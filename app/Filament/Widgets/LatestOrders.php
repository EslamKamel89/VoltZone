<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget {
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;
    public function table(Table $table): Table {
        return $table
            ->query(
                Order::query()->latest()->take(10)
            )
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
            ])->actions([
                Action::make('View')->url(
                    fn(Order $record) => OrderResource::getUrl('view', ['record' => $record])
                )->icon('heroicon-o-eye')
                    ->color('info'),
                Action::make('Edit')->url(
                    fn(Order $record) => OrderResource::getUrl('edit', ['record' => $record])
                )->icon('heroicon-o-pencil')
                    ->color('warning')
            ]);
    }
}
