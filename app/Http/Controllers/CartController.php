<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Modification;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function add(Request $request) 
    {
        $data = $request->all();

        $product_id = $data['id'];
        $quantity = $data['quantity'];
        $mod_id = $data['mod'];

        $product = null;
        $mod = null;

        if ($product_id) {
            $product = Product::find($product_id);

            if ($mod_id) {
                $mod = Modification::where('id', $mod_id)
                             ->where('product_id', $product_id)
                             ->first();
            }
        }

        $cart = new Cart();
        $cart->addToCart($product, $quantity, $mod);

        return response()->json($data, 200);
    }
}
