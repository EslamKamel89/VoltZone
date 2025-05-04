<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<div class="bg-gray-50">
    <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Your Cart</h1>
            <span class="text-gray-500">2 items</span>
        </div>

        <div class="flex flex-col gap-8 lg:flex-row">
            <!-- Cart Items - Left Column -->
            <div class="lg:w-2/3">
                <!-- Desktop Table -->
                <div class="hidden overflow-hidden bg-white shadow-sm md:block rounded-xl">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">Product</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">Price</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">Quantity</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">Total</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Product 1 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-lg">
                                            <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb" alt="Product image">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">iPhone 13 Pro</div>
                                            <div class="text-sm text-gray-500">256GB, Silver</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">$999.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="1" min="1" class="w-12 mx-2 text-center border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">$999.00</td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Product 2 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-lg">
                                            <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1546054454-aa26e2b734c7" alt="Product image">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Wireless Headphones</div>
                                            <div class="text-sm text-gray-500">Noise Cancelling</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">$199.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="1" min="1" class="w-12 mx-2 text-center border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">$199.00</td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile List -->
                <div class="space-y-4 md:hidden">
                    <!-- Product 1 -->
                    <div class="p-4 bg-white shadow-sm rounded-xl">
                        <div class="flex justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-lg">
                                    <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb" alt="Product image">
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900">iPhone 13 Pro</h3>
                                    <p class="text-sm text-gray-500">256GB, Silver</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <button class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" value="1" min="1" class="w-12 mx-2 text-center border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                <button class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <span class="font-medium">$999.00</span>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="p-4 bg-white shadow-sm rounded-xl">
                        <div class="flex justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-lg">
                                    <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1546054454-aa26e2b734c7" alt="Product image">
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900">Wireless Headphones</h3>
                                    <p class="text-sm text-gray-500">Noise Cancelling</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <button class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" value="1" min="1" class="w-12 mx-2 text-center border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                <button class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <span class="font-medium">$199.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary - Right Column -->
            <div class="lg:w-1/3">
                <div class="sticky p-6 bg-white shadow-sm rounded-xl top-8">
                    <h2 class="mb-6 text-lg font-bold">Order Summary</h2>

                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span>$1,198.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="text-green-600">Free</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Taxes</span>
                            <span>$95.84</span>
                        </div>

                        <div class="pt-4 mt-4 border-t border-gray-200">
                            <div class="flex justify-between font-bold">
                                <span>Total</span>
                                <span>$1,293.84</span>
                            </div>
                        </div>
                    </div>

                    <button class="w-full px-4 py-3 mt-6 font-medium text-white transition-colors bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Proceed to Checkout
                    </button>

                    <div class="flex items-center justify-center mt-4 space-x-2 text-sm text-gray-500">
                        <i class="fas fa-lock"></i>
                        <span>Secure checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>