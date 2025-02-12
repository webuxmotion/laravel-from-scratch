<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Currency;

class CurrencySelector extends Component
{
    public $currencies;
    public $selectedCurrency;

    public function __construct()
    {
        $currencies = Currency::orderBy('base', 'desc')->get();
        $selectedCurrency = isset($_COOKIE['currency']) ? htmlspecialchars($_COOKIE['currency']) : 'USD';

        // Fetch currencies from the database
        $this->currencies = $currencies;
        $this->selectedCurrency = $selectedCurrency;
    }

    public function render()
    {
        return view('components.currency-selector');
    }
}