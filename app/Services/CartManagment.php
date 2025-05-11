<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;

class CartManagment {
    static public string $cookieName = '$cart_items';
    static public int $expiryTime = 60 * 24 * 30;
    // todo: add item to cart

    // todo: remove item from cart

    // add cart items to cookie
    static public function addcartItemsToCookie(array $cart_items) {
        cookie(
            self::$cookieName,
            json_encode($cart_items),
            self::$expiryTime
        );
    }

    // clear cart items from cookie
    static public function clearCartItemsFromCookie() {
        cookie()->forget(self::$cookieName);
    }

    // todo: get all cart items from cookie
    static public function getCartItemsFromCookie(): array {
        $items = Cookie::get(self::$cookieName);
        if ($items) {
            return json_decode($items, true);
        }
        return [];
    }

    // todo: increment item quantity

    // todo: decrement item quantity

    // todo: calculate grand total
}
