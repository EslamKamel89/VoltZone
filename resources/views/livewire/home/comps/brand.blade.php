<?php

use Livewire\Volt\Component;
use App\Models\Brand;

new class extends Component {
    public Brand $brand;
}; ?>



<div>
    <flux:modal.trigger name="{{ 'brand'.$brand->id }}">
        <a wire:navigate href="{{ route('products.index' , ['filter'=>['brand'=>$brand->id]]) }}" class="flex flex-col items-center justify-center p-6 transition-all bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md group">
            <div class="flex items-center justify-center w-16 h-16 mb-3">
                <img src="{{ asset('storage/'.$brand->image) }}" alt="{{ $brand->name }}" class="object-contain h-12">
            </div>
            <h3 class="font-medium text-gray-900">{{ $brand->name }}</h3>
        </a>
    </flux:modal.trigger>

    <flux:modal name="{{ 'brand'.$brand->id }}" class="md:w-96">
        <div class="flex flex-col items-center justify-center p-6 transition-all bg-white rounded-xl hover:shadow-md group">
            <div class="flex items-center justify-center w-16 h-16 mb-3">
                <img src="{{ asset('storage/'.$brand->image) }}" alt="{{ $brand->name }}" class="object-contain h-12">
            </div>
            <h3 class="font-medium text-gray-900">{{ $brand->name }}</h3>
        </div>
    </flux:modal>
</div>