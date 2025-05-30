<?php

use App\Helpers\pr;
use App\Models\Address;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new class extends Component {
    public ?Order $order;
}; ?>

<div class="p-6 mb-10 rounded-md shadow-sm bg-gray-50 dark:bg-gray-700">
    <h2 class="mb-4 text-xl font-semibold text-gray-800 dark:text-white">Order Details</h2>
    <div class="space-y-2">
        <div class="flex justify-between text-sm">
            <span class="text-gray-600 dark:text-gray-300">Subtotal</span>
            <span class="text-gray-800 dark:text-white">{{ Number::currency($order->grand_total , 'USD') }}</span>
        </div>
        <div class="flex justify-between text-sm">
            <span class="text-gray-600 dark:text-gray-300">Discount</span>
            <span class="text-gray-800 dark:text-white">{{ Number::currency(0 , 'USD') }}</span>
        </div>
        <div class="flex justify-between text-sm">
            <span class="text-gray-600 dark:text-gray-300">Shipping</span>
            <span class="text-gray-800 dark:text-white">{{ Number::currency(0 , 'USD') }}</span>
        </div>
        <div class="flex justify-between pt-3 mt-4 font-semibold text-gray-800 border-t border-gray-300 dark:border-gray-600 dark:text-white">
            <span>Total</span>
            <span>{{ Number::currency($order->grand_total , 'USD') }}</span>
        </div>
    </div>
</div>