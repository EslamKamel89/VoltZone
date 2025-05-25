<?php

use Livewire\Volt\Component;
use App\Helpers\pr;
use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Services\CartManagment;
use App\Services\OrdersService;
use Livewire\Attributes\On;
use Stripe\Checkout\Session;
use Stripe\Stripe;

new class extends Component {
    public string $firstName;
    public string $lastName;
    public string $phone;
    public string $streetAddress;
    public string $city;
    public string $state;
    public string $zipCode;
    public string $paymentMethod;

    #[On('order-summary_submit-order')]
    public function submit() {
        $validated =   $this->validate(OrdersService::$orderValidation);
        $cartItems = CartManagment::getCartItemsFromCookie();
        $lineItems = OrdersService::transformCartItems($cartItems);
        $order = OrdersService::newOrder($validated);
        $address = OrdersService::newAddress($validated);
        if ($order->payment_method === 'cod') {
            OrdersService::saveOrder($cartItems, $order, $address);
            $this->dispatch(
                'show-toast',
                ['message' =>  "🎉 Success! Your order is complete and on its way to you. Thanks for shopping with us!"]
            );
            return redirect()->to(route('success.index'));
        }
        $session = OrdersService::stripeSession($lineItems);
        OrdersService::saveOrder($cartItems, $order, $address);
        $this->dispatch(
            'show-toast',
            ['message' =>  "🎉 Success! Your order is complete and on its way to you. Thanks for shopping with us!"]
        );
        return redirect($session->url);
    }
}; ?>

<div class="space-y-6 lg:col-span-2">
    <!-- Shipping Address Card -->
    <div class="p-6 transition-all duration-300 bg-white shadow-lg rounded-xl dark:bg-slate-800 hover:shadow-xl">
        <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b dark:text-white">Shipping Address</h2>
        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="first_name">First Name</label>
                    <input type="text" id="first_name"
                        wire:model="firstName"
                        class="w-full px-3 py-2 border border-gray-300 @error('firstName')!border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('firstName')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="last_name">Last Name</label>
                    <input type="text" id="last_name"
                        wire:model="lastName"
                        class="w-full px-3 py-2 border border-gray-300 @error('lastName')!border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('lastName')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="phone">Phone</label>
                <input type="text" id="phone"
                    wire:model="phone"
                    class="w-full px-3 py-2 border border-gray-300 @error('phone')!border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                @error('phone')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="address">Address</label>
                <input type="text" id="address"
                    wire:model="streetAddress"
                    class="w-full px-3 py-2 border border-gray-300 @error('streetAddress')!border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                @error('streetAddress')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="city">City</label>
                <input type="text" id="city"
                    wire:model="city"
                    class="w-full px-3 py-2 border border-gray-300 @error('city')!border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                @error('city')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="state">State</label>
                    <input type="text" id="state"
                        wire:model="state"
                        class="w-full px-3 py-2 border border-gray-300 @error('state')!border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('state')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="zip">ZIP Code</label>
                    <input type="text" id="zip"
                        wire:model="zipCode"
                        class="w-full px-3 py-2 border border-gray-300 @error('zipCode')!border-red-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('zipCode')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </form>
    </div>

    <!-- Payment Method Card -->
    <div class=" @error('paymentMethod') border !border-red-500 @enderror p-6 transition-all duration-300 bg-white shadow-lg rounded-xl dark:bg-slate-800 hover:shadow-xl">
        <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b dark:text-white">Select Payment Method</h2>
        <ul class="grid w-full gap-6 md:grid-cols-2">
            <li>
                <input type="radio" wire:model="paymentMethod" id="cash_on_delivery" value="cod" class="hidden peer">
                <label for="cash_on_delivery"
                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600">
                    <span class="block text-lg font-semibold">Cash on Delivery</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="hidden w-5 h-5 text-green-600 peer-checked:inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </label>
            </li>
            <li>
                <input type="radio" wire:model="paymentMethod" id="stripe" value="stripe" class="hidden peer">
                <label for="stripe"
                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600">
                    <span class="block text-lg font-semibold">Stripe</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="hidden w-5 h-5 text-blue-600 peer-checked:inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </label>
            </li>
            @error('paymentMethod')
            <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </ul>
    </div>
</div>