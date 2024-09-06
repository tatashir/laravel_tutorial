<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::SimplePaginate(6);
        return view('stocks', compact('stocks'));
    }
}
