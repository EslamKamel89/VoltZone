<?php

namespace App\Services;

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

    // todo: clear cart tiems from cookie

    // todo: get all cart items from cookie

    // todo: increment item quantity

    // todo: decrement item quantity

    // todo: calculate grand total
}
