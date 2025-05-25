<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class OrdersService {
    public static array $orderValidation = [
        'firstName' => 'required|max:255|string',
        'lastName' => 'required|max:255|string',
        'phone' => 'required|max:255|string',
        'streetAddress' => 'required|max:255|string',
        'city' => 'required|max:255|string',
        'state' => 'required|max:255|string',
        'zipCode' => 'required|max:255|string',
        'paymentMethod' => 'required|max:255|string',
    ];
    public static function transformCartItems(array $cartItems): array {
        $lineItems = [];
        foreach ($cartItems as $i => $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => Product::find($item['product_id'])->name,
                        'images' => $item['image'],
                    ],
                    'unit_amount' => round($item['unit_amount'] * 100),
                ],
                'quantity' => $item['quantity'],
            ];
        }
        return $lineItems;
    }
    public static function newOrder(array $validated) {
        $order = new Order();
        $order->user_id = auth()->id();
        $order->grand_total = CartManagment::grandTotal();
        $order->payment_method = $validated['paymentMethod'];
        $order->payment_status = 'pending';
        $order->status = 'new';
        $order->currency = 'USD';
        $order->shipping_amount = 0;
        $order->shipping_method = 'none';
        $order->notes = 'Order placed by ' . auth()->user()->name;
        return $order;
    }
    public static function newAddress(array $validated) {
        $address = new Address();
        $address->first_name = $validated['firstName'];
        $address->last_name = $validated['lastName'];
        $address->phone = $validated['phone'];
        $address->street_address = $validated['streetAddress'];
        $address->city = $validated['city'];
        $address->state = $validated['state'];
        // $address->country = $validated[''];
        $address->zip_code = $validated['zipCode'];
        return $address;
    }
    public static function saveOrder(array $cartItems, Order $order, Address $address) {
        $order->save();
        foreach ($cartItems as $item) {
            $order->products()->attach($item['product_id'], [
                "quantity" => $item["quantity"],
                "unit_amount" => $item["unit_amount"],
                "total_amount" => $item["total_amount"],
            ]);
        }
        $order->address()->save($address);
    }
    public static function stripeSession(array $lineItems): Session {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'payment_method_data' => ['card'],
            'success_url' => route('success.index') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancel.index'),
            'customer_email' => auth()->user()->email,
        ]);
        return $session;
    }
}
