<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Order;

new
    #[Title('Order')]
    class extends Component {
        public Order $order;
        public function mount() {
            $this->order->load(['user', 'orderItems', 'address']);
        }
    }; ?>

<div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Order Details</h1>
        <p class="mt-2 text-gray-500">Order #{{ $order->id }}</p>
    </div>

    <livewire:order.comps.details :order="$order" />

    <!-- Main Content -->
    <div class="flex flex-col gap-6 lg:flex-row">
        <!-- Left Column -->
        <div class="space-y-6 lg:w-3/4">
            <!-- Products Table -->
            <livewire:order.comps.table :order="$order" />

            <livewire:order.comps.address :order="$order" />
        </div>

        <livewire:order.comps.summary :order="$order" />
    </div>
</div>