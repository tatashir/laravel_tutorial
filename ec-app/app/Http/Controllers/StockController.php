<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\UserStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::SimplePaginate(6);
        return view('stocks', compact('stocks'));
    }

    public function myCart(UserStock $userStock)
    {
        $myCartStocks = $userStock->showMyCart();
        return view('myCart', compact('myCartStocks'));
    }

    public function addMyCart(Request $request, UserStock $userStock)
    {
        $userId = Auth::id();
        $stockId = $request->stockId;
        $message = $userStock->addMyCart($stockId);
        $myCartStocks = $userStock->showMyCart();

        return view('myCart', compact('myCartStocks', 'message'));
    }

    public function deleteMyCartStock(Request $request, UserStock $userStock)
    {
        $stockId = $request->stockId;
        $message = $userStock->deleteMyCartStock($stockId);
        $myCartStocks = $userStock->showMyCart();

        return view('myCart', compact('myCartStocks', 'message'));
    }
}
