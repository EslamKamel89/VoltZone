<?php

use App\Helpers\pr;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
    #[Title('Order Success')]
    class extends Component {
        public ?Order $order = null;
        public function mount() {
            $this->order = auth()->user()->orders()->with([
                "orderItems",
                "address",
            ])->latest()->first();
        }
    }; ?>

<div class="flex items-center justify-center min-h-screen px-4 py-8 bg-gray-100 font-poppins dark:bg-gray-900">
    <div class="w-full max-w-4xl p-6 bg-white shadow-lg rounded-xl dark:bg-gray-800 dark:border dark:border-gray-700">

        <h1 class="mb-8 text-2xl font-bold text-center text-gray-800 dark:text-white">
            Thank you. Your order has been received.
        </h1>

        <div class="grid grid-cols-1 gap-6 mb-10 md:grid-cols-2 xl:grid-cols-3">
            <livewire:success.comps.customer-details :address="$order->address" />
            <livewire:success.comps.order-info :order="$order" />
        </div>

        <livewire:success.comps.order-details :order="$order" />
        <livewire:success.comps.shipping-details :order="$order" />

        <!-- Action Buttons -->
        <div class="flex flex-col items-center justify-center gap-4 md:flex-row">
            <a href="/products">
                <flux:button variant="subtle">
                    Go back shopping
                </flux:button>
            </a>
            <a href="/orders">
                <flux:button variant="primary">
                    View My Orders
                </flux:button>
            </a>
        </div>

    </div>
</div>