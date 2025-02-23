<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create()
    {
        return view('users.register');
    }

    // Store User Data
    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User();

        // Hash Password
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        // Login
        Auth::login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    // Logout User
    public function logout(Request $request)
    {
        Auth::logout();

        // Preserve the cart before logout
        $cart = session('cart');

        // Logout the user
        Auth::logout();

        // clear session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Restore the cart after logout
        session(['cart' => $cart]);
        

        return redirect('/')->with('message', 'User logged out!');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Validate the request...
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'User logged in!');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials',
        ])
        ->withInput();
    }

    // Show Orders
    public function orders()
    {
        return view('users.orders');
    }
}
