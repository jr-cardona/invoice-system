<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Seller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display the specified resource filtering by name.
     * @param Request $request
     * @return
     */
    public function clients(Request $request) {
        $clients = Client::where('name', 'like', '%'. $request->name .'%')
            ->orderBy('name')
            ->limit('100')
            ->get();
        return $clients;
    }

    /**
     * Display the specified resource filtering by name.
     * @param Request $request
     * @return
     */
    public function sellers(Request $request) {
        $sellers = Seller::where('name', 'like', '%'. $request->name .'%')
            ->orderBy('name')
            ->limit('100')
            ->get();
        return $sellers;
    }

    /**
     * Display the specified resource filtering by name.
     * @param Request $request
     * @return
     */
    public function products(Request $request) {
        $products = Product::where('name', 'like', '%'. $request->name .'%')
            ->orderBy('name')
            ->limit('100')
            ->get();
        return $products;
    }
}