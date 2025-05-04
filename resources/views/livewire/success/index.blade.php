<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
    #[Title('Order Success')]
    class extends Component {
        //
    }; ?>

<div class="flex items-center justify-center min-h-screen px-4 py-8 bg-gray-100 font-poppins dark:bg-gray-900">
    <div class="w-full max-w-4xl p-6 bg-white shadow-lg rounded-xl dark:bg-gray-800 dark:border dark:border-gray-700">

        <!-- Thank You Message -->
        <h1 class="mb-8 text-2xl font-bold text-center text-gray-800 dark:text-white">
            Thank you. Your order has been received.
        </h1>

        <!-- Customer Info -->
        <div class="grid grid-cols-1 gap-6 mb-10 md:grid-cols-2 xl:grid-cols-3">
            <div class="p-4 rounded-md shadow-sm bg-gray-50 dark:bg-gray-700">
                <h2 class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Customer</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Cielo Schimmel</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">71582 Schmitt Springs</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Castro Valley, Delaware, 53476-0454</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Phone: 587-019-6103</p>
            </div>

            <!-- Order Info -->
            <div class="p-4 space-y-2 rounded-md shadow-sm bg-gray-50 dark:bg-gray-700">
                <h2 class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Order Info</h2>
                <div class="text-sm text-gray-600 dark:text-gray-400">Order Number: <span class="font-semibold text-gray-800 dark:text-white">29</span></div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Date: <span class="font-semibold text-gray-800 dark:text-white">17-02-2024</span></div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Total: <span class="font-semibold text-blue-600 dark:text-blue-400">₹157,495.00</span></div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Payment: <span class="font-semibold text-gray-800 dark:text-white">Cash on Delivery</span></div>
            </div>
        </div>

        <!-- Order Details -->
        <div class="p-6 mb-10 rounded-md shadow-sm bg-gray-50 dark:bg-gray-700">
            <h2 class="mb-4 text-xl font-semibold text-gray-800 dark:text-white">Order Details</h2>
            <div class="space-y-2">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-300">Subtotal</span>
                    <span class="text-gray-800 dark:text-white">₹157,495.00</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-300">Discount</span>
                    <span class="text-gray-800 dark:text-white">₹0</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-300">Shipping</span>
                    <span class="text-gray-800 dark:text-white">₹0</span>
                </div>
                <div class="flex justify-between pt-3 mt-4 font-semibold text-gray-800 border-t border-gray-300 dark:border-gray-600 dark:text-white">
                    <span>Total</span>
                    <span>₹157,495.00</span>
                </div>
            </div>
        </div>

        <!-- Shipping Details -->
        <div class="p-6 mb-10 rounded-md shadow-sm bg-gray-50 dark:bg-gray-700">
            <h2 class="mb-4 text-xl font-semibold text-gray-800 dark:text-white">Shipping</h2>
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7z" />
                    </svg>
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-white">Delivery</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Delivery within 24 Hours</p>
                    </div>
                </div>
                <p class="font-semibold text-gray-800 dark:text-white">₹0</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col items-center justify-center gap-4 md:flex-row">
            <a href="/products" class="w-full px-5 py-3 text-center text-blue-600 transition-all border border-blue-600 rounded-md md:w-auto hover:bg-blue-600 hover:text-white dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                Go back shopping
            </a>
            <a href="/orders" class="w-full px-5 py-3 text-center text-white transition-all bg-blue-600 rounded-md md:w-auto hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                View My Orders
            </a>
        </div>

    </div>
</div>