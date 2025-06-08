<?php

use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
    #[Title('Orders')]
    class extends Component {
        public $orders = [];
        public function mount() {
            $this->orders = Order::where('user_id', auth()->id())
                ->get();
        }
    }; ?>

<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto" x-init="{}">
    <h1 class="mb-6 text-4xl font-bold text-gray-800 dark:text-white">My Orders</h1>

    <!-- Responsive Order List -->
    <div class="overflow-hidden bg-white shadow-lg dark:bg-slate-800 rounded-xl">
        <!-- Desktop Table -->
        <div class="hidden overflow-x-auto md:block">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-slate-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-gray-400">Order</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-gray-400">Date</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-gray-400">Order Status</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-gray-400">Payment Status</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-gray-400">Order Amount</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end dark:text-gray-400">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($orders as $order )
                    <tr class="transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-slate-700">
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-gray-200">{{ $order->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">{{ $order->created_at }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-full shadow-sm">{{ $order->status }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-semibold text-white rounded-full shadow-sm {{ $order->payment_status == 'paid' ? 'bg-green-600' : 'bg-yellow-500' }}">
                                {{ $order->payment_status }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">{{ Number::currency($order->grand_total , 'USD') }}</td>
                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                            <a wire:navigate href="{{ route('orders.show' , ['order'=>$order->id]) }}" class="px-4 py-2 text-white transition bg-indigo-600 rounded-md hover:bg-indigo-700">View Details</a>
                        </td>
                    </tr>
                    @empty
                    <div>no data found</div>
                    @endforelse



                </tbody>
            </table>
        </div>

        <!-- Mobile Cards -->
        <div class="p-4 space-y-4 md:hidden">
            <!-- Card -->
            @forelse ($orders as $order )
            <div class="p-4 rounded-lg shadow-sm bg-gray-50 dark:bg-slate-700">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-semibold text-gray-800 dark:text-white">Order #{{ $order->id }}</span>
                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ $order->created_at }}</span>
                </div>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div>
                        <div class="text-gray-500 dark:text-gray-400">Status</div>
                        <span class="px-2 py-1 text-xs text-white bg-yellow-500 rounded">{{ $order->status }}</span>
                    </div>
                    <div>
                        <div class="text-gray-500 dark:text-gray-400">Payment</div>
                        <span class="px-2 py-1 text-xs text-white bg-green-500 rounded">{{ $order->payment_status }}</span>
                    </div>
                    <div>
                        <div class="text-gray-500 dark:text-gray-400">Amount</div>
                        <span class="font-medium text-gray-800 dark:text-white">{{ Number::currency($order->grand_total , 'USD') }}</span>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <a wire:navigate href="{{ route('orders.show' , ['order'=>$order->id]) }}" class="text-sm font-medium text-indigo-600 hover:underline">View Details</a>
                </div>
            </div>
            @empty

            @endforelse



        </div>
    </div>
</div>