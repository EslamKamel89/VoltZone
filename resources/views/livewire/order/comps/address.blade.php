<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Order;

new

    class extends Component {
        public Order $order;
    }; ?>

<!-- Shipping Address -->
<div class="overflow-hidden bg-white shadow-sm rounded-xl">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-lg font-semibold text-gray-900">Shipping Address</h2>
    </div>
    <div class="px-6 py-5">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Delivery Address</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $order->address->street_address }}</p>
                <p class="text-sm text-gray-900">{{ $order->address->state }} - {{ $order->address->city }} </p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Contact Information</h3>
                <p class="mt-1 text-sm text-gray-900">{{ $order->address->full_name }}</p>
                <p class="text-sm text-gray-900">{{ $order->address->phone }}</p>
            </div>
        </div>
    </div>
</div>