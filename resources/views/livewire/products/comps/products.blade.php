<?php

use Livewire\Volt\Component;
use App\Models\Product;

new class extends Component {
    public function with() {
        return [
            'products' => Product::all(),
        ];
    }
}; ?>

<div class="w-full md:w-3/4">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($products as $product )
        <livewire:products.comps.product :product="$product" :key="$product->id" />
        @endforeach
    </div>
</div>