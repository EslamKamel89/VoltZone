<?php

use App\Helpers\pr;
use App\Services\CartManagment;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Product;
use Barryvdh\Debugbar\Facades\Debugbar;

new
    #[Title('Product Details')]
    class extends Component {
        public Product $product;
        public int $count = 0;
        public function mount() {
            $this->count = CartManagment::getSingleItemCount($this->product->id) ?? 0;
        }
        public function increment() {
            $this->count++;
            $totalCount =  CartManagment::addItemToCart($this->product->id);
            $this->dispatch('cart-updated', ['count' => $totalCount]);
        }
        public function decrement() {
            if ($this->count < 1) return;
            $this->count--;
            $totalCount =    CartManagment::removeCartItem($this->product->id);
            $this->dispatch('cart-updated', ['count' => $totalCount]);
        }
    }; ?>

<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="overflow-hidden bg-white py-11 font-poppins dark:bg-gray-800">
        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
            <div class="grid grid-cols-1 gap-10 md:grid-cols-2">
                <!-- Left Column - Images -->
                <div x-data="{ mainImage : '{{ asset('storage/'.array_reverse($product->images)[0]) }}' ?? 'not found' }">
                    <div class="sticky top-0 z-30">
                        <div class="relative mb-6 h-[350px] flex w-full justify-center ">
                            <img x-bind:src="mainImage" alt="Main product" class="object-cover h-full rounded-lg shadow-md">
                        </div>
                        <div class="flex flex-wrap justify-start hidden gap-3 md:flex">
                            @foreach(array_reverse($product->images) as $image)
                            <div class="w-20 cursor-pointer" @click="mainImage = '{{ asset('storage/'.$image) }}'">
                                <img src="{{ asset('storage/'.$image) }}" alt="Thumbnail" class="object-cover w-full h-20 border border-transparent rounded-md hover:border-blue-500">
                            </div>
                            @endforeach
                        </div>
                        <div class="px-4 pt-6 mt-6 border-t border-gray-300 dark:border-gray-600">
                            <div class="flex items-center gap-2 text-gray-700 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7z" />
                                </svg>
                                <h2 class="text-base font-semibold">Free Shipping</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Product Info -->
                <div>
                    <div class="space-y-6">
                        <h2 class="text-2xl font-bold text-gray-800 md:text-4xl dark:text-gray-200">
                            {{ $product->name }}
                        </h2>
                        <p class="text-3xl font-bold text-gray-800 dark:text-gray-200">
                            {{Number::currency($product->price , 'USD') }}
                            <span class="ml-2 text-base font-normal text-gray-500 line-through dark:text-gray-400">{{ Number::currency($product->price * 1.2 , 'USD') }}</span>
                        </p>
                        <p class="text-gray-700 dark:text-gray-400">
                            {!! Str::markdown($product->description) !!}
                        </p>
                        <div>
                            <label class="block mb-2 text-lg font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                            <div x-data="{count : {{ $count }} }" class="flex items-center max-w-xs overflow-hidden bg-gray-300 rounded-lg dark:bg-gray-900">
                                <button wire:click="decrement" @click="()=>{if(count > 0)count--}" class="flex items-center justify-center w-10 h-10 text-xl text-white bg-gray-400 dark:bg-gray-700 hover:bg-gray-500 dark:hover:bg-gray-600">-</button>
                                <input readonly type="number" class="w-full text-lg text-center text-gray-800 bg-gray-300 dark:bg-gray-900 dark:text-gray-200" :value="count">
                                <button wire:click="increment" @click="count++" class="flex items-center justify-center w-10 h-10 text-xl text-white bg-gray-400 dark:bg-gray-700 hover:bg-gray-500 dark:hover:bg-gray-600">+</button>
                            </div>
                        </div>
                        <div>
                            <button class="w-full px-6 py-3 font-semibold text-white transition bg-blue-600 rounded-lg shadow-md md:w-auto hover:bg-blue-700">Add to Cart</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @script
    <script>
        const init = async () => {
            // const product = await $wire.getProduct();
            // $wire.myProduct = product;
            // console.log('------------------');
            // console.log($wire.product?.images[0]);
        }
        init();
    </script>
    @endscript
</div>