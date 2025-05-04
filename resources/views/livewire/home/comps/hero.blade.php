<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<div class="w-full bg-gray-50">
    <!-- Hero Section -->
    <section class="relative w-full overflow-hidden text-white shadow-2xl bg-gradient-to-r from-blue-900/10 to-gray-900/10 rounded-xl">
        <!-- Background Image/Video -->
        <div class="absolute inset-0 z-0">
            <video autoplay loop muted playsinline class="object-cover w-full h-full opacity-30">
                <source src="https://example.com/tech-showcase.mp4" type="video/mp4">
                <!-- Fallback image -->
                <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                    alt="Electronics Background" class="object-cover w-full h-full">
            </video>
        </div>

        <!-- Content -->
        <div class="container relative z-10 px-6 py-24 mx-auto md:py-32">
            <div class="max-w-2xl">
                <!-- Discount Badge (Animated) -->
                <span class="inline-block px-4 py-1 mb-4 text-black rounded-full bg-amber-500 animate-pulse">
                    🚀 Limited Offer: 20% Off New Arrivals!
                </span>

                <!-- Headline -->
                <h1 class="mb-4 text-4xl font-bold leading-tight text-black/80 md:text-6xl">
                    Upgrade Your Tech <br>
                    <span class="text-blue-600">Smartphones & TVs</span>
                </h1>

                <!-- Subtitle -->
                <p class="mb-8 text-lg text-gray-600 md:text-xl">
                    Discover cutting-edge electronics with free shipping and 24-month warranties.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap gap-4">
                    <flux:button variant="primary" href="/products" wire:navigate>
                        Shop Now
                    </flux:button>
                    <flux:button variant="danger" icon:trailing="fire" href="/products">
                        Hot Deals
                    </flux:button>
                </div>
            </div>
        </div>

        <!-- Floating Product Images (Optional) -->
        <div class="absolute hidden w-1/3 max-w-xl lg:block right-10 bottom-10 animate-float">
            <img src="https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1067&q=80"
                alt="Premium Smartphone" class="shadow-2xl rounded-xl">
        </div>
    </section>
</div>