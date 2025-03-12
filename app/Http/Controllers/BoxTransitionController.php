<?php

namespace App\Http\Controllers;

use App\Models\BoxTransition;
use App\Models\Branch;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoxTransitionController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $branch = Branch::where('user_id', $user->id)->first();
        $transitions = BoxTransition::query()->where('type', 'transfer')->where('branch_id', $branch->id);
        if ($request->type) {
            $transitions->where('type', 'transfer');
        }
        if ($request->branch_id) {
            $transitions->where('branch_id', $request->branch_id);
        }
        if ($request->currency_id) {
            $transitions->where('currency_id', $request->currency_id);
        }
        $transitions = $transitions->get();

        $branches = Branch::all();
        $currencies = Currency::all();
        return view('dashboard.box_transition.index', compact('transitions', 'branches', 'currencies'));
    }
    public function exchange(Request $request)
    {
        $user = Auth::user();
        $branch = Branch::where('user_id', $user->id)->first();
        $transitions = BoxTransition::query()->where('type', 'exchange')->where('branch_id', $branch->id);
        if ($request->type) {
            $transitions->where('type', 'exchange');
        }
        if ($request->branch_id) {
            $transitions->where('branch_id', $request->branch_id);
        }
        if ($request->currency_id) {
            $transitions->where('currency_id', $request->currency_id);
        }
        $transitions = $transitions->get();

        $branches = Branch::all();
        $currencies = Currency::all();
        return view('dashboard.box_transition.exchange', compact('transitions', 'branches', 'currencies'));
    }
}

