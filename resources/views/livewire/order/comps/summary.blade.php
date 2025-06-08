<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Order;

new class extends Component {
    public Order $order;
}; ?>

<!-- Right Column -->
<div class="lg:w-1/4">
    <div class="sticky p-6 bg-white shadow-sm rounded-xl top-8">
        <h2 class="mb-6 text-lg font-bold">Order Summary</h2>

        <div class="space-y-4">
            <div class="flex justify-between">
                <span class="text-gray-600">Subtotal</span>
                <span>{{ Number::currency($order->grand_total , 'USD') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Shipping</span>
                <span class="text-green-600">Free</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Taxes</span>
                <span>{{ Number::currency($order->grand_total * 0.012 , 'USD') }}</span>
            </div>

            <div class="pt-4 mt-4 border-t border-gray-200">
                <div class="flex justify-between font-bold">
                    <span>Total</span>
                    <span>{{ Number::currency($order->grand_total * 1.012 , 'USD') }}</span>
                </div>
            </div>
        </div>

    </div>
</div>