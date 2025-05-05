<?php

use Livewire\Volt\Component;
use App\Models\Category;

new class extends Component {
    public function with() {
        return [
            'categories' => Category::active()->limit(4)->get(),
        ];
    }
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

        <div class="grid w-full grid-cols-2 gap-6 mx-auto md:grid-cols-4">
            @foreach ($categories as $category )
            <livewire:home.comps.category :category="$category" :key="$category->id" />
            @endforeach


        </div>

        <!-- View All Button (Optional) -->
        <div class="mt-12 text-center">
            <a href="#" class="inline-block px-6 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700">
                View All Categories
            </a>
        </div>
    </section>
</div>