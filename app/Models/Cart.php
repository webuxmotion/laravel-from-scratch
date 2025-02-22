<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function addToCart($product, $quantity = 1, $mod = null)
    {
        // Встановлюємо валюту, якщо ще не встановлена
        session()->put('cart.currency', session('cart.currency', globalData('selectedCurrency')));

        // Визначаємо ідентифікатор, назву та ціну товару
        $id = $mod ? "{$product->id}-{$mod->id}" : $product->id;
        $title = $mod ? "{$product->title} ({$mod->title})" : $product->title;
        $price = $mod->price ?? $product->price;

        $currencyValue = session('cart.currency.value');
        $key = "cart.items.$id";

        // Додаємо або оновлюємо товар у кошику
        $cartItem = session($key, []);
        $cartItem['quantity'] = ($cartItem['quantity'] ?? 0) + $quantity;
        $cartItem['title'] = $title;
        $cartItem['alias'] = $product->alias;
        $cartItem['price'] = $price * $currencyValue;
        $cartItem['img'] = $product->img;

        session()->put($key, $cartItem);

        session()->increment('cart.quantity', $quantity);
        session()->increment('cart.sum', $price * $currencyValue * $quantity);
    }

    public function deleteItem($id)
    {
        $key = "cart.items.$id";

        if (session()->has($key)) {
            // Remove the item
            session()->forget($key);

            // Recalculate cart totals
            $items = session('cart.items', []);
            $totalQuantity = 0;
            $totalSum = 0;

            foreach ($items as $item) {
                $totalQuantity += $item['quantity'];
                $totalSum += $item['price'] * $item['quantity'];
            }

            // Update the cart totals
            session()->put('cart.quantity', $totalQuantity);
            session()->put('cart.sum', $totalSum);
        }
    }

    // clear cart
    public function clearCart()
    {
        session()->forget('cart');
    }

    public static function recalc($currencyCode)
    {
        if (session()->has('cart')) {
            $cart = session('cart');
            $cartCurrency = $cart['currency'];

            if ($cartCurrency->code != $currencyCode) {
                $currencies = globalData('currencies');
                $newCurrency = $currencies->where('code', $currencyCode)->first();

                $items = session('cart.items', []);

                foreach ($items as $id => $item) {
                    // Recalculate price for each item
                    $basePrice = $item['price'] / $cartCurrency->value; // Convert to base currency
                    $newPrice = $basePrice * $newCurrency->value;       // Convert to new currency

                    // Update item price
                    $items[$id]['price'] = $newPrice;
                }

                session()->put('cart.items', $items);

                // Recalculate cart sum
                $totalSum = 0;
                foreach ($items as $item) {
                    $totalSum += $item['price'] * $item['quantity'];
                }

                // Update cart currency, sum, and total quantity remains unchanged
                session()->put('cart.currency', $newCurrency);
                session()->put('cart.sum', $totalSum);
            }
        }
    }

    public static function getCartItems()
    {
        return session('cart.items', []);
    }
}
