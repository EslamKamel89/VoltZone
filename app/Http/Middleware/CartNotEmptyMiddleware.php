<?php

namespace App\Http\Middleware;

use App\Services\CartManagment;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartNotEmptyMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        $cartItems = CartManagment::getCartItemsFromCookie();
        if (!count($cartItems ?? [])) {
            return redirect()->to(route('home'));
        }
        return $next($request);
    }
}
