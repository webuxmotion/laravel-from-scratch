<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function inputSearch(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('title', 'like', "%$query%")
            ->limit(10)
            ->get();

        return json_encode($products);
    }

    public function search(Request $request)
    {
        $query = $request->input('s');

        $products = Product::where('title', 'like', "%$query%")
            ->get();

        $this->setMeta('Search: ' . e($query));

        return view('search.index', [
            'products' => $products,
            'query' => $query,
            'curr' =>  getCurr()
        ]);
    }
}
