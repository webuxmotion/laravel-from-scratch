<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    // Show Wallets
    public function index()
    {
        $wallets = Wallet::all();

        return view('wallets.index', [
            'wallets' => $wallets
        ]);
    }

    // Show Create Form
    public function create()
    {
        return view('wallets.create');
    }

    // Store Wallet Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'balance' => 'required|numeric',
            'description' => '',
            'currency' => '',
        ]);

        Wallet::create($formFields);

        return redirect('/wallets');
    }

    // Show Edit Form
    public function edit(Wallet $wallet)
    {
        return view('wallets.edit', [
            'wallet' => $wallet
        ]);
    }

    // Update Wallet Data
    public function update(Request $request, Wallet $wallet)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'balance' => 'required|numeric',
            'description' => '',
            'currency' => '',
        ]);

        $wallet->update($formFields);

        return redirect('/wallets');
    }
}
