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
}
