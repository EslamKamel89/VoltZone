<?php

use App\Helpers\pr;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Volt\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

new
    #[Title('Order Success')]
    class extends Component {
        #[Url]
        public ?string $session_id;
        public ?Order $order = null;
        public ?string $paymentStatus = null;
        public function mount() {
            $this->order = auth()->user()->orders()->with([
                "orderItems",
                "address",
            ])->latest()->first();
            if ($this->session_id) {
                try {
                    Stripe::setApiKey(env('STRIPE_SECRET'));
                    $session_info = Session::retrieve($this->session_id);
                    $this->paymentStatus = $session_info->payment_status;
                    $this->order->update([
                        'payment_status' => 'paid'
                    ]);
                } catch (\Throwable $th) {
                    $this->dispatch(
                        'show-toast',
                        ['message' => 'Error occurred while verifying payment']
                    );
                    if ($this->order->payment_status != 'paid') {
                        $this->order->update([
                            'payment_status' => 'failed'
                        ]);
                    }
                    return redirect()->route('cancel.index');
                }
            } else {
                $this->dispatch(
                    'show-toast',
                    ['message' => 'Something went wrong']
                );
            }
        }
    }; ?>

<div class="flex items-center justify-center min-h-screen px-4 py-8 bg-gray-100 font-poppins dark:bg-gray-900">
    <div class="w-full max-w-4xl p-6 bg-white shadow-lg rounded-xl dark:bg-gray-800 dark:border dark:border-gray-700">

        <h1 class="mb-8 text-2xl font-bold text-center  {{$paymentStatus != 'paid' ? 'text-red-700 dark:text-red-400' :  'text-gray-800 dark:text-white'  }}">
            {{ $paymentStatus == 'paid' ? "Thank you. Your order has been received." : "Sorry, Your order payment can't be confirmed" }}
        </h1>

        <div class="grid grid-cols-1 gap-6 mb-10 md:grid-cols-2 xl:grid-cols-3">
            <livewire:success.comps.customer-details :address="$order->address" />
            <livewire:success.comps.order-info :order="$order" />
        </div>

        <livewire:success.comps.order-details :order="$order" />
        <livewire:success.comps.shipping-details :order="$order" />

        <!-- Action Buttons -->
        <div class="flex flex-col items-center justify-center gap-4 md:flex-row">
            <a wire:navigate href="/products">
                <flux:button variant="subtle">
                    Go back shopping
                </flux:button>
            </a>
            <a wire:navigate href="/orders">
                <flux:button variant="primary">
                    View My Orders
                </flux:button>
            </a>
        </div>

    </div>
</div>