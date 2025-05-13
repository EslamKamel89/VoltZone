<?php

namespace App\Services;

use App\Helpers\pr;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagment {
    static public string $cookieName = 'cart_items';
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
        // pr::log($existingItemIndex, 'existingItemIndex');
        if ($existingItemIndex !== null) {
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
        // pr::log($cartItems, 'cartItems');
        self::addCartItemsToCookie($cartItems);
        return count($cartItems);
    }

    //  remove item from cart
    static public function removeCartItem(int|string $productId) {
        $cartItems = self::getCartItemsFromCookie();
        foreach ($cartItems as $index => $item) {
            if ($item['product_id'] == $productId) {
                unset($cartItems[$index]);
                // $cartItems = array_values($cartItems);
                break;
            }
        }
        self::addcartItemsToCookie($cartItems);
        return count($cartItems);
    }

    // add cart items to cookie
    static public function addcartItemsToCookie(array $cart_items) {
        Cookie::queue(
            self::$cookieName,
            json_encode($cart_items),
            self::$expiryTime
        );
    }

    // clear cart items from cookie
    static public function clearCartItemsFromCookie() {
        Cookie::queue(self::$cookieName, null, -1);
    }

    // get all cart items from cookie
    static public function getCartItemsFromCookie(): array {
        $items = Cookie::get(self::$cookieName);
        if ($items) {
            return json_decode($items, true);
        }
        return [];
    }

    //  increment item quantity
    static public function incrementItemQuantity(int |string $productId) {
        $cartItems  = self::getCartItemsFromCookie();
        foreach ($cartItems as $index => $item) {
            if ($item['product_id'] == $productId) {
                $cartItems[$index]['quantity'] = (int)$cartItems[$index]['quantity'] + 1;
                $cartItems[$index]['total_amount'] = $cartItems[$index]['quantity'] * $cartItems[$index]['unit_amount'];
                break;
            }
        }
        self::addCartItemsToCookie($cartItems);
        return $cartItems;
    }

    //  decrement item quantity
    static public function decrementItemQuantity(int |string $productId) {
        $cartItems  = self::getCartItemsFromCookie();
        foreach ($cartItems as $index => $item) {
            if ($item['product_id'] == $productId) {
                if ($cartItems[$index]['quantity'] > 1) {
                    $cartItems[$index]['quantity'] = (int)$cartItems[$index]['quantity'] - 1;
                    $cartItems[$index]['total_amount'] = $cartItems[$index]['quantity'] * $cartItems[$index]['unit_amount'];
                } elseif ($cartItems[$index]['quantity'] == 1) {
                    unset($cartItems[$index]);
                }
                break;
            }
        }
        self::addCartItemsToCookie($cartItems);
        return $cartItems;
    }
    //  calculate grand total
    static public function grandTotal() {
        $cartItems  = self::getCartItemsFromCookie();
        return array_sum(array_column($cartItems, 'total_amount'));
    }

    static public function getSingleItemCount(int | string $productId) {
        $totalCount = 0;
        $items = self::getCartItemsFromCookie();
        foreach ($items as $index => $item) {
            if ($item['product_id'] == $productId) {
                $totalCount += $item['quantity'];
                return $totalCount;
            }
        }
    }
}
