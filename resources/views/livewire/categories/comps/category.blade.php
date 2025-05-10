<?php

use Livewire\Volt\Component;
use App\Models\Category;

new class extends Component {
    public Category $category;
}; ?>

<div>

    <flux:modal.trigger name="{{ 'category'.$category->id }}">
        <a wire:navigate href="{{ route('products.index' , ['filter'=>['category'=>$category->id]]) }}" class="block overflow-hidden transition-shadow bg-white border border-gray-100 shadow-sm group rounded-xl hover:shadow-md">
            <div class="aspect-w-1 aspect-h-1">
                <img
                    src="{{ asset('storage/'.$category->image) }}"
                    alt="{{ $category->name }}"
                    class="object-cover w-full h-48 transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="p-4 text-center">
                <h3 class="text-lg font-medium text-gray-900">{{ $category->name }}</h3>
            </div>
        </a>
    </flux:modal.trigger>

    <flux:modal name="{{ 'category'.$category->id }}" class=" md:w-96">
        <div class="block overflow-hidden transition-shadow bg-white group rounded-xl hover:shadow-md">
            <div class="aspect-w-1 aspect-h-1">
                <img
                    src="{{ asset('storage/'.$category->image) }}"
                    alt="{{ $category->name }}"
                    class="object-cover w-full h-48 transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="p-4 text-center">
                <h3 class="text-lg font-medium text-gray-900">{{ $category->name }}</h3>
            </div>
        </div>
    </flux:modal>
</div>