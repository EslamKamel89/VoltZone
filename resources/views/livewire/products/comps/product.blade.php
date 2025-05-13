<?php

use App\Helpers\pr;
use Livewire\Volt\Component;
use App\Models\Product;
use App\Services\CartManagment;
use Livewire\Attributes\Computed;

new class extends Component {
    public Product $product;
    public $quantity = 0;
    public function mount() {
        $productInCartInfo = null;
        foreach (CartManagment::getCartItemsFromCookie() as $index => $item) {
            if ($item['product_id'] == $this->product->id) {
                $productInCartInfo =  pr::log($item, 3);
                break;
            }
        }
        if ($productInCartInfo) {
            $this->quantity = $productInCartInfo['quantity'];
        }
    }

    public function handleAddToCart() {
        $totalCount =   CartManagment::addItemToCart($this->product->id);
        $this->quantity++;
        // $this->dispatch(
        //     'item-added-to-cart.' . $this->product->id,
        //     ['message' => "{$this->product->name} added to cart"]
        // );
        $this->dispatch(
            'show-toast',
            ['message' => "{$this->product->name} added to cart"]
        );
        $this->dispatch('cart-updated', ['count' => $totalCount]);
    }
    public function with() {
        $badge = null;
        if ($this->product->is_featured) $badge = 'Featured';
        if ($this->product->on_sale) $badge = 'On Sale';

        return [
            'badge' => $badge,
        ];
    }
    public function getProduct() {
        return $this->product;
    }
}; ?>

<div class="overflow-hidden transition-shadow duration-300 bg-white shadow-md rounded-xl hover:shadow-xl">
    <!-- Image Container -->
    <div class="relative pt-[100%] w-full bg-gray-100 rounded-t-xl overflow-hidden group">
        <div class="absolute inset-0 flex items-center justify-center transition-transform duration-300 transform group-hover:scale-105">
            <a wire:navigate href="{{ route('products.show', ['product' => $product->slug]) }}">
                <img src="{{ asset('storage/' . $this->product->lastImage()) }}"
                    alt="{{ $product->name }}"
                    class="object-cover object-center w-full h-full">
            </a>
        </div>

        @if($badge)
        <div class="absolute top-2 left-2">
            <span class="px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded">{{ $badge }}</span>
        </div>
        @endif
    </div>

    <!-- Content -->
    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">{{ $product->name }}</h3>
        <div class="flex items-center justify-between mt-2">
            <span class="text-lg font-bold text-gray-800">${{ $product->price }}</span>
            <button wire:loading.attr="disabled"
                wire:click="handleAddToCart"
                class="px-4 py-2 text-sm font-medium text-white transition-colors duration-200 rounded-lg shadow-sm bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-60 disabled:cursor-not-allowed">
                {{ $quantity ? "Add More ({$quantity})" : "Add to Cart" }}
            </button>
        </div>
    </div>

</div>