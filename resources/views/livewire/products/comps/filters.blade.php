<?php

use App\Helpers\pr;
use Livewire\Volt\Component;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Arr;

new class extends Component {
    public ?string $selectedCategory = null;
    public ?string $selectedBrand = null;
    public array $query;
    public Bool $showFilter = false;
    public Bool  $onSale;
    public Bool  $inStock;
    public float $price  = 0;
    public float $maxPrice = 0;

    public function with() {
        return [
            'brands' => Brand::active()->get(),
            'categories' => Category::active()->get(),
            'maxPrice' => $this->maxPrice,
        ];
    }
    public function mount() {
        $this->query = request()->all(['filter', 'sort']) ?? ['filter' => null];
        $this->selectedCategory = $this->query['filter']['category'] ?? -1;
        $this->selectedBrand = $this->query['filter']['brand'] ?? -1;
        $this->onSale = (bool) Arr::get($this->query, 'filter.onsale');
        $this->inStock = (bool) Arr::get($this->query, 'filter.instock');
        $this->maxPrice = Product::max('price');
        $this->price = (float) Arr::get($this->query, 'filter.price', $this->maxPrice);
    }

    public function updated($property) {
        if ($property == 'selectedCategory') {
            if ($this->selectedCategory == -1) {
                unset($this->query['filter']['category']);
            } else {
                $this->query['filter']['category'] = $this->selectedCategory;
            }
            $this->filter();
        }
        if ($property == 'selectedBrand') {
            if ($this->selectedBrand == -1) {
                unset($this->query['filter']['brand']);
            } else {
                $this->query['filter']['brand'] = $this->selectedBrand;
            }
            $this->filter();
        }
        if ($property == 'onSale') {
            if (!$this->onSale) {
                unset($this->query['filter']['onsale']);
            } else {
                $this->query['filter']['onsale'] = 1;
            }
            $this->filter();
        }
        if ($property == 'inStock') {
            if (!$this->inStock) {
                unset($this->query['filter']['instock']);
            } else {
                $this->query['filter']['instock'] = 1;
            }
            $this->filter();
        }
        if ($property == 'price') {
            if ($this->price >= $this->maxPrice) {
                unset($this->query['filter']['price']);
            } else {
                $this->query['filter']['price'] = $this->price;
            }
            $this->filter();
        }
    }
    public function filter() {
        $this->redirect(route(
            'products.index',
            $this->query,
        ), true);
    }
    public function toggleFilter() {
        $this->showFilter = !$this->showFilter;
    }
}; ?>

<div class="w-full md:w-1/4">
    <div class="sticky p-6 bg-white rounded-lg shadow-sm top-4">
        <div class="flex items-center justify-between w-full text-xl font-semibold cursor-pointer " wire:click="toggleFilter">
            <h2>Filters</h2>
            <flux:icon.funnel />
        </div>
        <div class="mt-6 md:block {{ $showFilter? 'hidden' : '' }}">
            <!-- Categories Filter -->
            <div class="pb-6 mb-8 border-b border-gray-200">
                <flux:radio.group wire:model.live="selectedCategory" label="Categories">
                    <flux:radio :value="-1" label="All" />
                    @foreach($categories as $category)
                    <flux:radio :value="$category->id" :label="$category->name" :key="'category.filter'.$category->id" />
                    @endforeach
                </flux:radio.group>
            </div>

            <!-- Brands Filter -->
            <div class="pb-6 mb-8 border-b border-gray-200">
                <flux:radio.group wire:model.live="selectedBrand" label="Brands">
                    <flux:radio :value="-1" label="All" />
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
                        <input type="checkbox" class="text-blue-600 rounded" wire:model.live="inStock" />
                        <span class="ml-2 text-gray-600">In Stock</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="text-blue-600 rounded" wire:model.live="onSale" />
                        <span class="ml-2 text-gray-600">On Sale</span>
                    </label>
                </div>
            </div>

            <!-- Price Filter -->
            <div x-data="{productPrice : $wire.price}">
                <h3 class="mb-3 font-medium text-gray-700">Price Range</h3>
                <div class="flex justify-between mb-2 text-sm text-gray-600">
                    <span>$0</span>
                    <span>${{ $maxPrice }}</span>
                </div>
                <input type="range" min="0" max="{{ $maxPrice }}" value="2000" wire:model.live.debounce.750="price" x-model="productPrice"
                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                <div class="mt-2 text-right">
                    <span class="text-sm font-medium text-gray-700">Max: </span>
                    <span class="text-sm font-medium text-gray-700" x-text="'$'+productPrice"></span>
                </div>
            </div>
        </div>
    </div>
</div>