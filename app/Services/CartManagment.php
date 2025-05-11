<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagment {
    static public string $cookieName = '$cart_items';
    static public int $expiryTime = 60 * 24 * 30;
    static protected  $cartItemStructureExample = [
        'product_id' => 1,
        'quantity' => 2,
        'unit_amount' => 7, // the price of each product
        'total_amount' => 3, // total price for all products unit_amount * quantity
        'image' => 'http://fake.com',
    ];
    //  add item to cart
    static public function addItemToCart(int | string $productId): int {
        $cartItems  = self::getCartItemsFromCookie();
        $existingItemIndex = null;
        foreach ($cartItems as $index => $item) {
            if ($item['product_id'] == $productId) {
                $existingItemIndex = $index;
                break;
            }
        }
        if ($existingItemIndex) {
            $cartItems[$existingItemIndex]['quantity'] =
                (int)$cartItems[$existingItemIndex]['quantity'] + 1;
            $cartItems[$existingItemIndex]['total_amount'] =
                $cartItems[$existingItemIndex]['quantity'] *
                $cartItems[$existingItemIndex]['unit_amount'];
        } else {
            $product = Product::findOrFail($productId);
            $cartItems[] = [
                'product_id' => $product->id,
                'quantity' => 1,
                'unit_amount' => $product->price, // the price of each product
                'total_amount' => $product->price, // total price for all products unit_amount * quantity
                'image' => array_reverse($product->images)[0],
            ];
        }
        self::addCartItemsToCookie($cartItems);
        return count($cartItems);
    }

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

    // get all cart items from cookie
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
