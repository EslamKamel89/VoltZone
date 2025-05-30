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
    <h2 class="mb-4 text-xl font-semibold text-gray-800 dark:text-white">Shipping</h2>
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <flux:icon.truck class="text-blue-600" />
            <div>
                <p class="font-semibold text-gray-800 dark:text-white">Delivery</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Delivery within 24 Hours</p>
            </div>
        </div>
        <p class="font-semibold text-gray-800 dark:text-white">{{ Number::currency(0 , 'USD') }}</p>
    </div>
</div>