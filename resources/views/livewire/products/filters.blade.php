<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="w-full md:w-1/4">
    <div class="sticky p-6 bg-white rounded-lg shadow-sm top-4">
        <h2 class="mb-6 text-xl font-semibold">Filters</h2>

        <!-- Categories Filter -->
        <div class="pb-6 mb-8 border-b border-gray-200">
            <h3 class="mb-3 font-medium text-gray-700">Categories</h3>
            <div class="space-y-2">
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 rounded">
                    <span class="ml-2 text-gray-600">Smartphones</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 rounded">
                    <span class="ml-2 text-gray-600">Televisions</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 rounded">
                    <span class="ml-2 text-gray-600">Laptops</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 rounded">
                    <span class="ml-2 text-gray-600">Headphones</span>
                </label>
            </div>
        </div>

        <!-- Brands Filter -->
        <div class="pb-6 mb-8 border-b border-gray-200">
            <h3 class="mb-3 font-medium text-gray-700">Brands</h3>
            <div class="space-y-2">
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 rounded">
                    <span class="ml-2 text-gray-600">Samsung</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 rounded">
                    <span class="ml-2 text-gray-600">Apple</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 rounded">
                    <span class="ml-2 text-gray-600">Sony</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 rounded">
                    <span class="ml-2 text-gray-600">Xiaomi</span>
                </label>
            </div>
        </div>

        <!-- Product Status Filter -->
        <div class="pb-6 mb-8 border-b border-gray-200">
            <h3 class="mb-3 font-medium text-gray-700">Product Status</h3>
            <div class="space-y-2">
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 rounded">
                    <span class="ml-2 text-gray-600">In Stock</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="text-blue-600 rounded">
                    <span class="ml-2 text-gray-600">On Sale</span>
                </label>
            </div>
        </div>

        <!-- Price Filter -->
        <div>
            <h3 class="mb-3 font-medium text-gray-700">Price Range</h3>
            <div class="flex justify-between mb-2 text-sm text-gray-600">
                <span>$0</span>
                <span>$2000</span>
            </div>
            <input type="range" min="0" max="2000" value="2000"
                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
            <div class="mt-2 text-right">
                <span class="text-sm font-medium text-gray-700">Max: $2000</span>
            </div>
        </div>
    </div>
</div>