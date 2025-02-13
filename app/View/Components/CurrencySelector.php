<?php

namespace App\View\Components;

use Illuminate\View\Component;


class CurrencySelector extends Component
{
    public $currencies;
    public $selectedCurrency;

    public function __construct()
    {
        $globalData = globalData();

        $this->currencies = $globalData->getData()['currencies'];
        $this->selectedCurrency = $globalData->getData()['selectedCurrency'];
    }

    public function render()
    {
        return view('components.currency-selector');
    }
}