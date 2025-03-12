<?php

namespace App\Http\Controllers;

use App\Console\Commands\UpdateCurrencyRates;
use App\Console\Kernel;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        return view('dashboard.currencies.index', compact('currencies'));
    }

}
