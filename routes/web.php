<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'home.index')
    ->name('home');
Volt::route('/categories', 'categories.index')
    ->name('categories.index');
Volt::route('/products', 'products.index')
    ->name('products.index');
Volt::route('/cart', 'cart.index')
    ->name('cart.index');
Volt::route('/products/{product}', "product_details.index")->name('products.show');
Volt::route('/checkout', 'checkout.index')->name('checkout.index');
Volt::route('/orders', 'orders.index')->name('orders.index');
Volt::route('/orders/{order}', 'order.index')->name('orders.show');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
