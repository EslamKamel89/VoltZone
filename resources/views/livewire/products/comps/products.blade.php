<?php

use Livewire\Volt\Component;
use App\Models\Product;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

new class extends Component {

    public function with() {
        $products = QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::exact('category', 'category_id'),
                AllowedFilter::exact('brand', 'brand_id'),
                AllowedFilter::exact('instock', 'in_stock'),
                AllowedFilter::exact('onsale', 'on_sale'),
            ])
            ->get();
        return [
            'products' => $products,
        ];
    }
}; ?>

<div class="w-full md:w-3/4">


    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse ($products as $product )
        <livewire:products.comps.product :product="$product" :key="'products.index'.$product->id" />
        @empty
        <div class="w-full mt-5 text-sm font-semibold text-center text-gray-600 col-span-full ">
            <div class="flex items-center justify-center space-x-2">
                <flux:icon.magnifying-glass />
                <div>There are no Products Available</div>
            </div>
        </div>
        @endforelse
    </div>
</div>