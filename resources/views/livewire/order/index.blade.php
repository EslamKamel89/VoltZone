<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
    #[Title('Order')]
    class extends Component {
        //
    }; ?>

<div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Order Details</h1>
        <p class="mt-2 text-gray-500">Order #ORD-2024-0053</p>
    </div>

    <!-- Stats Cards Grid -->
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
                    <p class="text-lg font-semibold text-gray-900">Jace Grimes</p>
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
                    <p class="text-lg font-semibold text-gray-900">17 Feb 2024</p>
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
                            Processing
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
                            Paid
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col gap-6 lg:flex-row">
        <!-- Left Column -->
        <div class="space-y-6 lg:w-3/4">
            <!-- Products Table -->
            <div class="overflow-hidden bg-white shadow-sm rounded-xl">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900">Order Items</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Product</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Price</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Qty</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-md">
                                            <img class="object-cover w-full h-full" src="http://localhost:8000/storage/products/01HND3J5XS7ZC5J84BK5YDM6Z2.jpg" alt="Samsung Galaxy Watch6">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Samsung Galaxy Watch6</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">₹29,999.00</td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">1</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">₹29,999.00</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-md">
                                            <img class="object-cover w-full h-full" src="http://localhost:8000/storage/products/01HND30J0P7C6MWQ1XQK7YDQKA.jpg" alt="Samsung Galaxy Book3">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Samsung Galaxy Book3</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">₹75,000.00</td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">5</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">₹375,000.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="overflow-hidden bg-white shadow-sm rounded-xl">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900">Shipping Address</h2>
                </div>
                <div class="px-6 py-5">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Delivery Address</h3>
                            <p class="mt-1 text-sm text-gray-900">42227 Zoila Glens</p>
                            <p class="text-sm text-gray-900">Oshkosh, Michigan, 55928</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Contact Information</h3>
                            <p class="mt-1 text-sm text-gray-900">Jace Grimes</p>
                            <p class="text-sm text-gray-900">023-509-0009</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="lg:w-1/4">
            <div class="sticky overflow-hidden bg-white shadow-sm rounded-xl top-6">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900">Order Summary</h2>
                </div>
                <div class="px-6 py-5 space-y-4">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Subtotal</span>
                        <span class="text-sm font-medium text-gray-900">₹404,999.00</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Shipping</span>
                        <span class="text-sm font-medium text-green-600">Free</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Tax</span>
                        <span class="text-sm font-medium text-gray-900">₹0.00</span>
                    </div>
                    <div class="pt-4 mt-4 border-t border-gray-200">
                        <div class="flex justify-between">
                            <span class="text-base font-semibold text-gray-900">Total</span>
                            <span class="text-base font-semibold text-gray-900">₹404,999.00</span>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50">
                    <button class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Print Invoice
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>