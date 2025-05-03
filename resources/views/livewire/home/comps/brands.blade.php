<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<div class="bg-gray-50">
    <!-- Popular Brands Section -->
    <section class="px-4 py-16 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <!-- Title & Description -->
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Browse Popular Brands
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">
                Discover top electronics brands trusted by millions worldwide.
                Quality you can rely on for smartphones, TVs, and more.
            </p>
        </div>

        <!-- Brands Grid -->
        <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
            <!-- Brand Card 1 -->
            <div class="flex flex-col items-center justify-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md group">
                <div class="flex items-center justify-center w-16 h-16 mb-3">
                    <!-- Replace with actual brand logo -->
                    <i class="text-4xl text-gray-800 transition-colors fab fa-apple group-hover:text-blue-600"></i>
                </div>
                <h3 class="font-medium text-gray-900">Apple</h3>
            </div>

            <!-- Brand Card 2 -->
            <div class="flex flex-col items-center justify-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md group">
                <div class="flex items-center justify-center w-16 h-16 mb-3">
                    <i class="text-4xl text-gray-800 transition-colors fab fa-samsung group-hover:text-blue-600"></i>
                </div>
                <h3 class="font-medium text-gray-900">Samsung</h3>
            </div>

            <!-- Brand Card 3 -->
            <div class="flex flex-col items-center justify-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md group">
                <div class="flex items-center justify-center w-16 h-16 mb-3">
                    <img src="https://logo.clearbit.com/sony.com" alt="Sony" class="object-contain h-12">
                </div>
                <h3 class="font-medium text-gray-900">Sony</h3>
            </div>

            <!-- Brand Card 4 -->
            <div class="flex flex-col items-center justify-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md group">
                <div class="flex items-center justify-center w-16 h-16 mb-3">
                    <img src="https://logo.clearbit.com/lg.com" alt="LG" class="object-contain h-10">
                </div>
                <h3 class="font-medium text-gray-900">LG</h3>
            </div>

            <!-- Brand Card 5 -->
            <div class="flex flex-col items-center justify-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md group">
                <div class="flex items-center justify-center w-16 h-16 mb-3">
                    <img src="https://logo.clearbit.com/xiaomi.com" alt="Xiaomi" class="object-contain h-10">
                </div>
                <h3 class="font-medium text-gray-900">Xiaomi</h3>
            </div>

            <!-- Brand Card 6 -->
            <div class="flex flex-col items-center justify-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md group">
                <div class="flex items-center justify-center w-16 h-16 mb-3">
                    <i class="text-4xl text-gray-800 transition-colors fas fa-headphones group-hover:text-blue-600"></i>
                </div>
                <h3 class="font-medium text-gray-900">Bose</h3>
            </div>
        </div>

        <!-- View All Button (Optional) -->
        <div class="mt-12 text-center">
            <a href="#" class="inline-block px-6 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                View All Brands
            </a>
        </div>
    </section>
</div>