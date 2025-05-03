<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<div class="bg-gray-50">
    <!-- Categories Section -->
    <section class="px-4 py-16 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <!-- Title & Description -->
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Browse Categories
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">
                Explore our wide range of electronics categories to find exactly what you need.
            </p>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            <!-- Category 1 -->
            <a href="#" class="block overflow-hidden transition-shadow bg-white border border-gray-100 shadow-sm group rounded-xl hover:shadow-md">
                <div class="aspect-w-1 aspect-h-1">
                    <img
                        src="https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80"
                        alt="Smartphones"
                        class="object-cover w-full h-48 transition-transform duration-300 group-hover:scale-105">
                </div>
                <div class="p-4 text-center">
                    <h3 class="text-lg font-medium text-gray-900">Smartphones</h3>
                </div>
            </a>

            <!-- Category 2 -->
            <a href="#" class="block overflow-hidden transition-shadow bg-white border border-gray-100 shadow-sm group rounded-xl hover:shadow-md">
                <div class="aspect-w-1 aspect-h-1">
                    <img
                        src="https://images.unsplash.com/photo-1593784991095-a205069470b6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80"
                        alt="Televisions"
                        class="object-cover w-full h-48 transition-transform duration-300 group-hover:scale-105">
                </div>
                <div class="p-4 text-center">
                    <h3 class="text-lg font-medium text-gray-900">Televisions</h3>
                </div>
            </a>

            <!-- Category 3 -->
            <a href="#" class="block overflow-hidden transition-shadow bg-white border border-gray-100 shadow-sm group rounded-xl hover:shadow-md">
                <div class="aspect-w-1 aspect-h-1">
                    <img
                        src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80"
                        alt="Laptops"
                        class="object-cover w-full h-48 transition-transform duration-300 group-hover:scale-105">
                </div>
                <div class="p-4 text-center">
                    <h3 class="text-lg font-medium text-gray-900">Laptops</h3>
                </div>
            </a>

            <!-- Category 4 -->
            <a href="#" class="block overflow-hidden transition-shadow bg-white border border-gray-100 shadow-sm group rounded-xl hover:shadow-md">
                <div class="aspect-w-1 aspect-h-1">
                    <img
                        src="https://images.unsplash.com/photo-1546054454-aa26e2b734c7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80"
                        alt="Headphones"
                        class="object-cover w-full h-48 transition-transform duration-300 group-hover:scale-105">
                </div>
                <div class="p-4 text-center">
                    <h3 class="text-lg font-medium text-gray-900">Headphones</h3>
                </div>
            </a>

            <!-- Category 5 -->
            <a href="#" class="block overflow-hidden transition-shadow bg-white border border-gray-100 shadow-sm group rounded-xl hover:shadow-md">
                <div class="aspect-w-1 aspect-h-1">
                    <img
                        src="https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80"
                        alt="Smart Watches"
                        class="object-cover w-full h-48 transition-transform duration-300 group-hover:scale-105">
                </div>
                <div class="p-4 text-center">
                    <h3 class="text-lg font-medium text-gray-900">Smart Watches</h3>
                </div>
            </a>
        </div>

        <!-- View All Button (Optional) -->
        <div class="mt-12 text-center">
            <a href="#" class="inline-block px-6 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700">
                View All Categories
            </a>
        </div>
    </section>
</div>