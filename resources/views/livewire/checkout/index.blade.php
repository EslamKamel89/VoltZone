<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
    #[Title('Checkout')]
    class extends Component {
        //
    }; ?>

<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="mb-6 text-3xl font-extrabold text-gray-900 dark:text-white">Checkout</h1>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Left Section - Shipping & Payment -->
        <div class="space-y-6 lg:col-span-2">
            <!-- Shipping Address Card -->
            <div class="p-6 transition-all duration-300 bg-white shadow-lg rounded-xl dark:bg-slate-800 hover:shadow-xl">
                <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b dark:text-white">Shipping Address</h2>
                <form>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="block mb-1 text-gray-700 dark:text-gray-300" for="first_name">First Name</label>
                            <input type="text" id="first_name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700 dark:text-gray-300" for="last_name">Last Name</label>
                            <input type="text" id="last_name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block mb-1 text-gray-700 dark:text-gray-300" for="phone">Phone</label>
                        <input type="text" id="phone"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    <div class="mt-4">
                        <label class="block mb-1 text-gray-700 dark:text-gray-300" for="address">Address</label>
                        <input type="text" id="address"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    <div class="mt-4">
                        <label class="block mb-1 text-gray-700 dark:text-gray-300" for="city">City</label>
                        <input type="text" id="city"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">
                        <div>
                            <label class="block mb-1 text-gray-700 dark:text-gray-300" for="state">State</label>
                            <input type="text" id="state"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700 dark:text-gray-300" for="zip">ZIP Code</label>
                            <input type="text" id="zip"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Payment Method Card -->
            <div class="p-6 transition-all duration-300 bg-white shadow-lg rounded-xl dark:bg-slate-800 hover:shadow-xl">
                <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b dark:text-white">Select Payment Method</h2>
                <ul class="grid w-full gap-6 md:grid-cols-2">
                    <li>
                        <input type="radio" name="payment_method" id="cash_on_delivery" value="cod" class="hidden peer">
                        <label for="cash_on_delivery"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600">
                            <span class="block text-lg font-semibold">Cash on Delivery</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="hidden w-5 h-5 text-green-600 peer-checked:inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input type="radio" name="payment_method" id="stripe" value="stripe" class="hidden peer">
                        <label for="stripe"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600">
                            <span class="block text-lg font-semibold">Stripe</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="hidden w-5 h-5 text-blue-600 peer-checked:inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Right Section - Order Summary & Basket -->
        <div class="space-y-6 lg:col-span-1">
            <!-- Order Summary Card -->
            <div class="p-6 transition-all duration-300 bg-white shadow-lg rounded-xl dark:bg-slate-800 hover:shadow-xl">
                <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b dark:text-white">Order Summary</h2>
                <div class="space-y-2">
                    <div class="flex justify-between text-gray-700 dark:text-gray-300">
                        <span>Subtotal</span>
                        <span>$45,000.00</span>
                    </div>
                    <div class="flex justify-between text-gray-700 dark:text-gray-300">
                        <span>Taxes</span>
                        <span>$0.00</span>
                    </div>
                    <div class="flex justify-between text-gray-700 dark:text-gray-300">
                        <span>Shipping</span>
                        <span>Free</span>
                    </div>
                    <hr class="my-3 border-gray-300 dark:border-gray-600">
                    <div class="flex justify-between text-lg font-bold text-gray-900 dark:text-white">
                        <span>Grand Total</span>
                        <span>$45,000.00</span>
                    </div>
                </div>
                <button
                    class="w-full px-4 py-3 mt-6 font-semibold text-white transition-all duration-300 rounded-lg bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700">
                    Place Order
                </button>
            </div>

            <!-- Basket Summary Card -->
            <div class="p-6 transition-all duration-300 bg-white shadow-lg rounded-xl dark:bg-slate-800 hover:shadow-xl">
                <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b dark:text-white">Basket Summary</h2>
                <ul class="space-y-4 divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="flex items-center py-3">
                        <img src="https://iplanet.one/cdn/shop/files/iPhone_15_Pro_Max_Blue_Titanium_PDP_Image_Position-1__en-IN_1445x.jpg?v=1695435917"
                            alt="Product" class="object-cover rounded-md w-14 h-14">
                        <div class="flex-1 ml-4">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Apple iPhone 15 Pro Max</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Qty: 1</p>
                        </div>
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">$320</span>
                    </li>
                    <li class="flex items-center py-3">
                        <img src="https://iplanet.one/cdn/shop/files/iPhone_15_Pro_Max_Blue_Titanium_PDP_Image_Position-1__en-IN_1445x.jpg?v=1695435917"
                            alt="Product" class="object-cover rounded-md w-14 h-14">
                        <div class="flex-1 ml-4">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Apple iPhone 15 Pro Max</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Qty: 1</p>
                        </div>
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">$320</span>
                    </li>
                    <li class="flex items-center py-3">
                        <img src="https://iplanet.one/cdn/shop/files/iPhone_15_Pro_Max_Blue_Titanium_PDP_Image_Position-1__en-IN_1445x.jpg?v=1695435917"
                            alt="Product" class="object-cover rounded-md w-14 h-14">
                        <div class="flex-1 ml-4">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Apple iPhone 15 Pro Max</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Qty: 1</p>
                        </div>
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">$320</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>