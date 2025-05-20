<?php

use Livewire\Volt\Component;
use App\Helpers\pr;
use App\Services\CartManagment;

new class extends Component {
    public array $cartItems = [];
    public float $grandTotal = 0;
    public function mount() {
        $this->cartItems = CartManagment::getCartItemsFromCookie();
        $this->grandTotal = CartManagment::grandTotal();
    }
}; ?>

<div class="space-y-6 lg:col-span-1">
    <!-- Order Summary Card -->
    <div class="p-6 transition-all duration-300 bg-white shadow-lg rounded-xl dark:bg-slate-800 hover:shadow-xl">
        <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b dark:text-white">Order Summary</h2>
        <div class="space-y-2">
            <div class="flex justify-between text-gray-700 dark:text-gray-300">
                <span>Subtotal</span>
                <span>{{ Number::currency($grandTotal , 'USD') }}</span>
            </div>
            <div class="flex justify-between text-gray-700 dark:text-gray-300">
                <span>Taxes</span>
                <span>{{ Number::currency($grandTotal * 0.012 , 'USD') }}</span>
            </div>
            <div class="flex justify-between text-gray-700 dark:text-gray-300">
                <span>Shipping</span>
                <span>Free</span>
            </div>
            <hr class="my-3 border-gray-300 dark:border-gray-600">
            <div class="flex justify-between text-lg font-bold text-gray-900 dark:text-white">
                <span>Grand Total</span>
                <span>{{ Number::currency($grandTotal * 1.012 , 'USD') }}</span>
            </div>
        </div>
        <button
            class="w-full px-4 py-3 mt-6 font-semibold text-white transition-all duration-300 rounded-lg bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700">
            Place Order
        </button>
    </div>

    <!-- Basket Summary Card -->
    <div class="p-6 transition-all duration-300 bg-white shadow-lg rounded-xl dark:bg-slate-800 hover:shadow-xl">
        <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b dark:text-white">Basket Summary</h2>
        <ul class="space-y-4 divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($cartItems as $cartItem )

            <li class="flex items-center py-3">
                @php
                pr::log($cartItem);
                @endphp
                <img src="{{ asset('/storage/'.$cartItem['image']) }}"
                    alt="Product" class="object-cover rounded-md w-14 h-14">
                <div class="flex-1 ml-4">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{Number::currency( $cartItem['unit_amount'] , 'USD') }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Qty: {{ $cartItem['quantity'] }}</p>
                </div>
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ Number::currency($cartItem['total_amount'] , 'USD') }}</span>
            </li>
            @endforeach

        </ul>
    </div>
</div>