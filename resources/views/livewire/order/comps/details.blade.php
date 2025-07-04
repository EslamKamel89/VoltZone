<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Order;

new

    class extends Component {
        public Order $order;
    }; ?>

<div class="grid grid-cols-1 gap-5 mb-8 sm:grid-cols-2 lg:grid-cols-4">
    <!-- Customer Card -->
    <div class="p-5 transition-shadow bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
        <div class="flex items-center space-x-4">
            <div class="p-3 text-blue-600 rounded-lg bg-blue-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Customer</p>
                <p class="text-lg font-semibold text-gray-900">{{ $order->user->name }}</p>
            </div>
        </div>
    </div>

    <!-- Order Date Card -->
    <div class="p-5 transition-shadow bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
        <div class="flex items-center space-x-4">
            <div class="p-3 text-purple-600 rounded-lg bg-purple-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Order Date</p>
                <p class="text-lg font-semibold text-gray-900">{{ $order->created_at->toFormattedDateString() }}</p>
            </div>
        </div>
    </div>

    <!-- Order Status Card -->
    <div class="p-5 transition-shadow bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
        <div class="flex items-center space-x-4">
            <div class="p-3 text-yellow-600 rounded-lg bg-yellow-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Order Status</p>
                <div class="mt-1">
                    <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full">
                        {{ $order->status }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Status Card -->
    <div class="p-5 transition-shadow bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
        <div class="flex items-center space-x-4">
            <div class="p-3 text-green-600 rounded-lg bg-green-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Payment Status</p>
                <div class="mt-1">
                    <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                        {{ $order->payment_status }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>