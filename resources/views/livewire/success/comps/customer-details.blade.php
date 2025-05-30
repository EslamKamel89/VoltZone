<?php

use App\Helpers\pr;
use App\Models\Address;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
    class extends Component {
        public ?Address $address;
    }; ?>

<div class="p-4 rounded-md shadow-sm bg-gray-50 dark:bg-gray-700">
    <h2 class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Customer</h2>
    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $address->first_name .' '.$address->last_name}}</p>
    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $address->state.' - '.$address->city}}</p>
    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $address->street_address  }}</p>
    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $address->phone }}</p>
</div>