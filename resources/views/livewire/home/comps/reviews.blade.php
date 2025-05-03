<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<div class="bg-gray-50">
    <!-- Customer Reviews Section -->
    <section class="px-4 py-16 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <!-- Title & Description -->
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Customer Reviews
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">
                Hear what our customers say about their shopping experience with us.
            </p>
        </div>

        <!-- Reviews Grid -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Review 1 -->
            <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="font-semibold text-gray-900">Ahmed Mohamed</h3>
                        <p class="text-sm text-gray-500">Member since Jan 2023</p>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span class="flex text-yellow-400">
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />

                            <i class="fas fa-star-half-alt"></i>
                        </span>
                        <span class="font-medium text-gray-700">4.5</span>
                    </div>
                </div>
                <p class="text-gray-600">
                    "The smartphone I bought exceeded my expectations! Fast delivery and excellent customer service when I had questions about the warranty."
                </p>
            </div>

            <!-- Review 2 -->
            <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="font-semibold text-gray-900">Sarah Johnson</h3>
                        <p class="text-sm text-gray-500">Member since Mar 2022</p>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span class="flex text-yellow-400">
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                        </span>
                        <span class="font-medium text-gray-700">5.0</span>
                    </div>
                </div>
                <p class="text-gray-600">
                    "My new TV arrived perfectly packaged. The picture quality is amazing and the setup was so easy. Will definitely shop here again!"
                </p>
            </div>

            <!-- Review 3 -->
            <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="font-semibold text-gray-900">Mohammed Ali</h3>
                        <p class="text-sm text-gray-500">Member since Nov 2023</p>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span class="flex text-yellow-400">
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                        </span>
                        <span class="font-medium text-gray-700">4.0</span>
                    </div>
                </div>
                <p class="text-gray-600">
                    "Great prices on laptops compared to other stores. The only reason I'm not giving 5 stars is because the delivery took 2 days longer than estimated."
                </p>
            </div>

            <!-- Review 4 -->
            <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="font-semibold text-gray-900">Fatima Hassan</h3>
                        <p class="text-sm text-gray-500">Member since Aug 2021</p>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span class="flex text-yellow-400">
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                        </span>
                        <span class="font-medium text-gray-700">5.0</span>
                    </div>
                </div>
                <p class="text-gray-600">
                    "I've ordered 3 times from this store and each experience was perfect. Their return policy is very fair too."
                </p>
            </div>

            <!-- Review 5 -->
            <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="font-semibold text-gray-900">David Wilson</h3>
                        <p class="text-sm text-gray-500">Member since May 2023</p>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span class="flex text-yellow-400">
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                        </span>
                        <span class="font-medium text-gray-700">3.0</span>
                    </div>
                </div>
                <p class="text-gray-600">
                    "Product quality was good but the shipping took longer than expected. Customer service was helpful though."
                </p>
            </div>

            <!-- Review 6 -->
            <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="font-semibold text-gray-900">Layla Ahmed</h3>
                        <p class="text-sm text-gray-500">Member since Feb 2024</p>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span class="flex text-yellow-400">
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                            <flux:icon.star variant="micro" />
                        </span>
                        <span class="font-medium text-gray-700">5.0</span>
                    </div>
                </div>
                <p class="text-gray-600">
                    "The wireless headphones I bought are fantastic! Great sound quality and battery life. Will recommend to all my friends."
                </p>
            </div>
        </div>

        <!-- View All Button (Optional) -->
        <div class="mt-12 text-center">
            <a href="#" class="inline-block px-6 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                Read All Reviews
            </a>
        </div>
    </section>
</div>