<?php

namespace App\Http\Controllers;

use App\Models\BoxTransition;
use Illuminate\Http\Request;
use App\Models\Exchange;
use App\Models\Branch;
use App\Models\Currency;
use App\Models\FinanceBox;
use Illuminate\Support\Facades\Auth;
class ExchangeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $branch = Branch::where('user_id', $user->id)->first();
        $exchanges = Exchange::with(['branch', 'currency'])->where('branch_id', $branch->id)->latest()->paginate(10);
        return view('dashboard.exchange.index', compact('exchanges'));
    }
    public function create()
    {
        $branches = Branch::all();
        $currencies = Currency::all();
        return view('dashboard.exchange.create', compact('branches', 'currencies'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'from_currency' => 'required',
            'to_currency' => 'required',
            'amount_from' => 'required|numeric|min:0',
            'amount_to' => 'required|numeric|min:0',
            'fees' => 'required|numeric|min:0',
        ]);
        // dd($request->all());
        $user = Auth::user();
        $branch = Branch::where('user_id', $user->id)->first();
        $exchange = new Exchange();
        $exchange->branch_id = $branch->id;
        $exchange->from_currency = $request->from_currency;
        $exchange->to_currency = $request->to_currency;
        $exchange->amount_from = $request->amount_from;
        $exchange->amount_to = $request->amount_to;
        $exchange->fees = $request->fees;
        $exchange->save();

        BoxTransition::create([
            'branch_id' => $branch->id,
            'currency_id' => $request->from_currency,
            'amount' => $request->amount_from,
            'amount_after_fees' => $request->amount_to - $request->fees,
            'fees' => $request->fees,
            'type' => 'exchange',
        ]);
        return redirect()->route('exchanges.index')->with('success', 'تم إنشاء التحويل بنجاح');
    }
    public function destroy(Exchange $exchange)
    {
        $exchange->delete();
        return redirect()->route('exchanges.index')->with('success', 'تم حذف التحويل بنجاح');
    }
}


