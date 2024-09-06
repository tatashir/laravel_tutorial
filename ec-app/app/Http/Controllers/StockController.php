<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\UserStock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::SimplePaginate(6);
        return view('stocks', compact('stocks'));
    }

    public function myCart()
    {
        $myCartStocks = UserStock::all();
        return view('myCart', compact('myCartStocks'));
    }
}
