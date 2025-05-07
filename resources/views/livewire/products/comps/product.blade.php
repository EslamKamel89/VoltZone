<?php

use Livewire\Volt\Component;
use App\Models\Product;
use Livewire\Attributes\Computed;

new class extends Component {
    public Product $product;
}; ?>

<div class="overflow-hidden transition-shadow bg-white rounded-lg shadow-sm hover:shadow-md">
    <div class="relative pt-[100%] w-full">
        <div class="absolute top-0 left-0 w-full h-full ">
            <a wire:navigate href="{{ route('products.show' , ['product'=>$product->slug]) }}">
                <img src="{{ asset('storage/'.$this->product->lastImage()) }}"
                    alt="{{ $product->name }}" class="h-full mx-auto ">
            </a>
        </div>
    </div>
    <div class="p-4">
        <h3 class="mb-1 font-medium text-gray-900">{{ $product->name }}</h3>
        <div class="flex items-center justify-between mt-2">
            <span class="font-semibold text-gray-800">${{ $product->price }}</span>
            <button class="px-3 py-1 text-sm text-white transition-colors bg-blue-600 rounded hover:bg-blue-700">
                Add to Cart
            </button>
        </div>
    </div>
</div>