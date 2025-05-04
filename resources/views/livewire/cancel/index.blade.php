<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="flex items-center justify-center min-h-screen px-4 bg-gray-50 dark:bg-gray-900 sm:px-6 lg:px-8">
    <div class="w-full max-w-md mx-auto">
        <div class="overflow-hidden transition-all duration-300 bg-white shadow-xl dark:bg-gray-800 rounded-xl hover:shadow-2xl">
            <!-- Header with decorative element -->
            <div class="p-6 text-center bg-red-500">
                <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-white rounded-full bg-opacity-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white">Payment Failed</h1>
                <p class="mt-2 text-red-100">Your order has been cancelled</p>
            </div>

            <!-- Content area -->
            <div class="px-6 py-8">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">We couldn't process your payment</h3>
                    <div class="mt-4 text-gray-600 dark:text-gray-300">
                        <p>Don't worry, your order has been cancelled and no charges were made.</p>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="grid grid-cols-1 gap-4 mt-8 sm:grid-cols-2">
                    <a href="#" class="inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-white transition-colors duration-200 bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Try Payment Again
                    </a>
                    <a href="#" class="inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-gray-700 transition-colors duration-200 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Contact Support
                    </a>
                </div>

                <!-- Additional help -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Need immediate help? <a href="#" class="font-medium text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300">Live chat with us</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer note -->
        <div class="mt-6 text-center">
            <p class="text-xs text-gray-500 dark:text-gray-400">
                Transaction ID: TXN-789456123 | Order #ORD-2024-0053
            </p>
        </div>
    </div>
</div>