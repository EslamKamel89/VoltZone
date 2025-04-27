<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords {
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public  function getHeaderWidgets(): array {
        return [
            OrderStats::class,
        ];
    }
    public function getTabs(): array {
        return [
            'all' => Tab::make(),
            'New' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'new')),
            'Processing' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'processing')),
            'Delivered' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'delivered')),
            'Shipped' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'shipped')),
            'Canceled' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'canceled')),


        ];
    }
}
