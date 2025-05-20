<?php

use App\Models\Product;
use App\Services\CartManagment;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
    #[Title('Cart')]
    class extends Component {
        public array $cartItems = [];
        public float $grandTotal = 0;
        public function mount() {
            $this->cartItems = CartManagment::getCartItemsFromCookie();
            $this->getProductDetails();
            $this->grandTotal = CartManagment::grandTotal();
        }
        public function getProductDetails() {
            foreach ($this->cartItems as $index => $item) {
                $product = Product::findOrFail($item['product_id']);
                $this->cartItems[$index]['product'] = $product;
            }
        }
        public function increment(int $productId) {
            $this->cartItems =  CartManagment::incrementItemQuantity($productId);
            $this->updateCartItems();
        }
        public function decrement(int $productId) {
            $this->cartItems =  CartManagment::decrementItemQuantity($productId);
            $this->updateCartItems();
        }
        public function removeItemFromCart(int $productId) {
            $this->cartItems = CartManagment::removeCartItem($productId);
            $this->updateCartItems();
        }
        public function updateCartItems() {
            $this->getProductDetails();
            $this->grandTotal = array_sum(array_column($this->cartItems, 'total_amount'));
            $this->dispatch('cart-updated', ['count' => count($this->cartItems)]);
        }
    }; ?>


<div class="bg-gray-50">
    <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Your Cart</h1>
            @if (count($cartItems))
            <span class="text-gray-500">{{ count($cartItems) }} Items</span>
            @endif
        </div>
        <div class="flex flex-col w-full gap-8 lg:flex-row">
            <!-- Cart Items - Left Column -->
            <div class="{{ count($cartItems) ? 'lg:w-2/3' : 'lg:w-full'}}">
                <!-- Desktop Table -->
                <div class="hidden overflow-x-auto bg-white shadow-sm md:block rounded-xl">
                    <table class="w-full divide-y divide-gray-200 ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase ">Product</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">Price</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">Quantity</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">Total</th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($cartItems as $item )
                            <tr>
                                <td class="max-w-md px-6 py-4 whitespace-normal ">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-lg">
                                            <img src="{{ asset('storage/' . $item['product']->lastImage()) }}"
                                                alt="{{ $item['product']->name }}"
                                                class="object-cover object-center w-full h-full">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $item['product']->name }}</div>
                                            <div class="text-sm text-gray-500 line-clamp-3">{!! str($item['product']->description )->limit(50)->markdown( ) !!}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ Number::currency($item['product']->price , 'USD') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <button class="text-gray-500 cursor-pointer hover:scale-105 hover:text-gray-700" wire:click.prevent="decrement({{ $item['product']->id }})">
                                            <flux:icon.minus />
                                        </button>
                                        <input disabled type="number" value="{{ $item['quantity'] }}" min="1" class="w-12 mx-2 text-center border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        <button class="text-gray-500 cursor-pointer hover:scale-105 hover:text-gray-700" wire:click.prevent="increment({{ $item['product']->id }})">
                                            <flux:icon.plus />
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ Number::currency($item['total_amount']) }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    <button class="cursor-pointer hover:text-red-500 hover:scale-105" wire:click="removeItemFromCart({{ $item['product']->id }})">
                                        <flux:icon.trash />
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="" colspan="4">
                                    <div class="w-full my-4 text-sm text-center text-gray-600"> There are no items in your cart</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Mobile List -->
                <div class="space-y-4 md:hidden">
                    @forelse ($cartItems as $item )
                    <div class="p-4 bg-white shadow-sm rounded-xl">
                        <div class="flex justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-lg">
                                    <img class="object-cover w-full h-full" src="{{ asset('storage/' . $item['product']->lastImage()) }}" alt="{{ $item['product']->name }}">
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900">{{ $item['product']->name }}</h3>
                                </div>
                            </div>
                            <button class="cursor-pointer hover:text-red-500 hover:scale-105" wire:click="removeItemFromCart({{ $item['product']->id }})">
                                <flux:icon.trash />
                            </button>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <button class="text-gray-500 cursor-pointer hover:scale-105 hover:text-gray-700" wire:click.prevent="decrement({{ $item['product']->id }})">
                                    <flux:icon.minus />
                                </button>
                                <input disabled type="number" value="{{ $item['quantity'] }}" min="1" class="w-12 mx-2 text-center border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                <button class="text-gray-500 cursor-pointer hover:scale-105 hover:text-gray-700" wire:click.prevent="increment({{ $item['product']->id }})">
                                    <flux:icon.plus />
                                </button>
                            </div>
                            <span class="font-medium">{{Number::currency($item['product']->price , 'USD')}}</span>
                        </div>
                    </div>
                    @empty
                    <div class="p-4 bg-white shadow-sm rounded-xl">
                        <div class="w-full my-4 text-sm text-center text-gray-600"> There are no items in your cart</div>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Order Summary - Right Column -->
            @if (count($cartItems))

            <div class="lg:w-1/3">
                <div class="sticky p-6 bg-white shadow-sm rounded-xl top-8">
                    <h2 class="mb-6 text-lg font-bold">Order Summary</h2>

                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span>{{ Number::currency($grandTotal , 'USD') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="text-green-600">Free</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Taxes</span>
                            <span>{{ Number::currency($grandTotal * 0.012 , 'USD') }}</span>
                        </div>

                        <div class="pt-4 mt-4 border-t border-gray-200">
                            <div class="flex justify-between font-bold">
                                <span>Total</span>
                                <span>{{ Number::currency($grandTotal * 1.012 , 'USD') }}</span>
                            </div>
                        </div>
                    </div>
                    @if (count($cartItems))

                    <div class="flex flex-col items-center w-full">
                        <a wire:navigate href="{{ route('checkout.index') }}" class="px-4 py-3 mt-6 font-medium text-white transition-colors bg-blue-600 rounded-lg shadow-sm cursor-pointer hover:scale-105 cursor-pointerw-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Proceed to Checkout
                        </a>
                        <div class="flex items-center justify-center mt-4 space-x-2 text-sm text-gray-500">
                            <flux:icon.lock-closed />
                            <span>Secure checkout</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>