<?php

use Livewire\Volt\Component;
use App\Models\Category;
use App\Models\Brand;

new class extends Component {
    public int $selectedCategory;
    public int $selectedBrand;
    public function with() {
        return [
            'brands' => Brand::all(),
            'categories' => Category::all(),

        ];
    }
}; ?>

<div class="w-full md:w-1/4" x-data="{show:false}">
    <div class="sticky p-6 bg-white rounded-lg shadow-sm top-4">
        <div class="flex items-center justify-between w-full text-xl font-semibold cursor-pointer " @click="show=!show">
            <h2>Filters</h2>
            <flux:icon.funnel />
        </div>
        <div class="mt-6 md:block" x-bind:class="{'hidden':!show}" x-cloak>
            <!-- Categories Filter -->
            <div class="pb-6 mb-8 border-b border-gray-200">
                <flux:radio.group wire:model="selectedCategory" label="Categories">
                    @foreach($categories as $category)
                    <flux:radio :value="$category->id" :label="$category->name" :key="'category.filter'.$category->id" />
                    @endforeach
                </flux:radio.group>
            </div>

            <!-- Brands Filter -->
            <div class="pb-6 mb-8 border-b border-gray-200">
                <flux:radio.group wire:model="selectedBrand" label="Brands">
                    @foreach($brands as $brand)
                    <flux:radio :value="$brand->id" :label="$brand->name" :key="'brand.filter'.$brand->id" />
                    @endforeach
                </flux:radio.group>
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
</div>