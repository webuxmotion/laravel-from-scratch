<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Modification;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class CartController extends Controller
{
    public function index()
    {
        $html = new HtmlString($this->getHtml());

        return view('cart.index', compact('html'));
    }

    public function success()
    {
        // if not email or not order_id, redirect to home
        if (!request()->get('email') || !request()->get('order_id')) {
            return redirect()->route('home');
        }

        return view('cart.success');
    }

    public function checkout(Request $request)
    {
        // get form data
        $data = request()->all();
        $cartData = [];
        $user = null;
        $wasLoggedIn = false;

        if (auth()->user() == null) {
            $user = User::where('email', $data['email'])->first();

            // if user exists, just check if password is correct
            if ($user) {
                
                if (password_verify($data['password'], $user->password)) {

                    auth()->login($user);
                    $wasLoggedIn = true;
                } else {

                    return redirect()->back()
                        ->withErrors(['password' => 'Password is incorrect'])
                        ->withInput();
                }
            } else {
                // if user does not exist, create new user
                $request->validate([
                    'password' => 'min:6|required',
                ]);

                $user = new User();
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->name = 'User';
                $user->save();

                auth()->login($user);
                $wasLoggedIn = true;
            }
        } else {
            $user = auth()->user();
        }

        $cartData['user_id'] = $user->id;
        $cartData['note'] = $data['comment'] ?? null;

        $order_id = Order::saveOrder($cartData);

        Order::mailOrder($order_id, $user->email);

        Cart::clearCart();

        return redirect()->route('cart.success', [
            'order_id' => $order_id,
            'email' => $user->email,
            'wasLoggedIn' => $wasLoggedIn,
        ]);
    }

    public function add(Request $request)
    {
        $data = $request->all();

        $product_id = $data['id'];
        $quantity = $data['quantity'];
        $mod_id = $data['mod'] ?? null;

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

        return $this->getHtml();
    }

    public function show()
    {
        return $this->getHtml();
    }

    public function getHtml()
    {
        // Return rendered HTML
        return view('cart.cart-modal');
    }

    public function delete(Request $request)
    {
        // get id from request
        $id = $request->get('id');

        $cart = new Cart();
        $cart->deleteItem($id);

        return $this->getHtml();
    }

    // clear cart
    public function clear()
    {
        Cart::clearCart();

        return $this->getHtml();
    }
}
