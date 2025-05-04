<?php

use Livewire\Volt\Component;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;

new class extends Component {
    public function with() {
        return [
            'brands' => Brand::active()->get(),
        ];
    }
}; ?>


<div class="bg-gray-50">
    <section class="px-4 py-16 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Browse Popular Brands
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">
                Discover top electronics brands trusted by millions worldwide.
                Quality you can rely on for smartphones, TVs, and more.
            </p>
        </div>

        <div class="grid w-full grid-cols-2 gap-6 mx-auto md:grid-cols-4">
            @foreach( $brands as $brand)
            <livewire:home.comps.brand :brand="$brand" :key="$brand->id" />
            @endforeach
        </div>
        <div class="flex justify-center w-full">
            <flux:button variant="primary" icon:trailing="chevron-double-right" class="mt-12 text-center">
                <a wire:navigate href="/">
                    View All Brands
                </a>
            </flux:button>
        </div>
    </section>
</div>