<?php

use App\Helpers\pr;
use Livewire\Volt\Component;
use Livewire\Attributes\URL;

new class extends Component {
    #[Url()]
    public string $sort;
    public  $query;
    public function mount() {
        $this->query = request()->all(['filter', 'sort']);
    }
    public function updated(String $property) {
        if ($property == 'sort') {
            $this->query['sort'] = $this->sort;
            $this->redirect(route('products.index', $this->query), true);
        }
    }
}; ?>

<div>
    <div class="sticky p-6 mt-4 mb-4 bg-white rounded-lg shadow-sm top-4">
        <div class="flex items-center justify-center w-full h-full space-x-2">
            <flux:select wire:model.live="sort" placeholder="Sort by">
                <flux:select.option value="-created_at"> Newest Items </flux:select.option>
                <flux:select.option value="created_at"> Earliest Items </flux:select.option>
                <flux:select.option value="price">Cheapest First</flux:select.option>
                <flux:select.option value="-price">Most Expensive</flux:select.option>
            </flux:select>
            <flux:icon.presentation-chart-line />
        </div>
    </div>
</div>