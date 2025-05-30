<?php

use App\Helpers\pr;
use App\Models\Address;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new class extends Component {
    public ?Order $order;
}; ?>

<div class="p-4 space-y-2 rounded-md shadow-sm bg-gray-50 dark:bg-gray-700">
    <h2 class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Order Info</h2>
    <div class="text-sm text-gray-600 dark:text-gray-400">Order Number: <span class="font-semibold text-gray-800 dark:text-white">{{ $order->id }}</span></div>
    <div class="text-sm text-gray-600 dark:text-gray-400">Date: <span class="font-semibold text-gray-800 dark:text-white">{{ $order->created_at->format('Y-m-d') }}</span></div>
    <div class="text-sm text-gray-600 dark:text-gray-400">Total: <span class="font-semibold text-blue-600 dark:text-blue-400">{{ Number::currency($order->grand_total , 'USD') }}</span></div>
    <div class="text-sm text-gray-600 dark:text-gray-400">Payment: <span class="font-semibold text-gray-800 dark:text-white">{{ $order->payment_method == 'stripe' ? 'Stripe' : ($order->payment_method == 'cod' ? 'Cash On Delivery' : 'Error') }}</span></div>
</div>