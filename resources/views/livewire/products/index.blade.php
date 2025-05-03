<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<div class="bg-gray-50">
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-8 text-3xl font-bold text-gray-800">Our Products</h1>

        <div class="flex flex-col gap-8 md:flex-row">
            <livewire:products.filters />
            <livewire:products.products />
        </div>
    </div>
</div>