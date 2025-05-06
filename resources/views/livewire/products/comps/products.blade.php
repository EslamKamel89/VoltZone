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
        @foreach ($products as $product )
        <livewire:products.comps.product :product="$product" :key="'products.index'.$product->id" />
        @endforeach
    </div>
</div>