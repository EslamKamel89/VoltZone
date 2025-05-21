<?php

use App\Services\CartManagment;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
    #[Title('Checkout')]
    class extends Component {
        public function mount() {
        }
    }; ?>

<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="mb-6 text-3xl font-extrabold text-gray-900 dark:text-white">Checkout</h1>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <livewire:checkout.comps.order_data />

        <livewire:checkout.comps.order_summary />
    </div>
</div>