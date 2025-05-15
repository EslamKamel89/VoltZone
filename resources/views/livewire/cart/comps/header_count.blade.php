<?php

use App\Services\CartManagment;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component {
    public $totalCount = null;
    public function mount() {
        $this->totalCount = count(CartManagment::getCartItemsFromCookie());
    }
    #[On('cart-updated')]
    public function listenToCartUpdate(array $payload) {
        $this->totalCount = $payload['count'] ?? null;
    }
}; ?>

<div>
    <span class="relative {{$totalCount ? 'mr-4' : '' }}">
        <span>Cart </span>
        @if ($totalCount)
        <span class="absolute px-2 py-1 text-white border rounded-full -top-2 -right-7 bg-accent"> {{ $totalCount  }}</span>
        @endif
    </span>
    @script
    <script>
        window.Flux.appearance = "light";
    </script>
    @endscript
</div>