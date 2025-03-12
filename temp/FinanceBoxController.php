<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FinanceBox;
use App\Models\Branch;
use App\Models\Currency;
class FinanceBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $financeBoxes = FinanceBox::all();
        // $branches = Branch::all();
        // $currencies = Currency::all();
        $financeBoxes = FinanceBox::with('currency')->get();
        dd($financeBoxes);

        // return view('dashboard.finance-boxes.index', compact('financeBoxes' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $financeBox = FinanceBox::create($request->validate(FinanceBox::rules()));

        return redirect()->route('finance-boxes.index')->with('success', 'تم الإنشاء بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(FinanceBox $financeBox)
    {
        return view('dashboard.finance-boxes.details', compact('financeBox'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinanceBox $financeBox)
    {
        $financeBox->update($request->validate(FinanceBox::rules()));
        return redirect()->route('finance-boxes.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinanceBox $financeBox)
    {
        $financeBox->delete();
        return redirect()->route('finance-boxes.index')->with('success', 'تم الحذف بنجاح');
    }
}
