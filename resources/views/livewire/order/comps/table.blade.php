<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Order;

new

    class extends Component {
        public Order $order;
    }; ?>

<div class="overflow-hidden bg-white shadow-sm rounded-xl">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-lg font-semibold text-gray-900">Order Items</h2>
    </div>
    <div class="overflow-x-auto">
        <div class="hidden overflow-x-auto bg-white shadow-sm md:block rounded-xl">
            <table class="w-full divide-y divide-gray-200 ">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase ">Product</th>
                        <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">Price</th>
                        <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">Quantity</th>
                        <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($order->orderItems as $item )
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

                                <input disabled type="number" value="{{ $item['quantity'] }}" min="1" class="w-12 mx-2 text-center border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">

                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ Number::currency($item['total_amount']) }}</td>

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
            @forelse ($order->orderItems as $item )
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

                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <input disabled type="number" value="{{ $item['quantity'] }}" min="1" class="w-12 mx-2 text-center border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
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
</div>