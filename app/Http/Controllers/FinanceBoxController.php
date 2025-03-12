<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Currency;
use App\Models\FinanceBox;
use Illuminate\Http\Request;

class FinanceBoxController extends Controller
{
    public function index()
    {
        $financeBoxes = FinanceBox::with(['currency' ,'branch'])->get();

        return view('dashboard.finance-boxes.index', compact('financeBoxes' ));
    }

    public function create()
{
    $branches = Branch::all();
    $currencies = Currency::all();

    return view('dashboard.finance-boxes.create', compact('branches', 'currencies'));
}

    public function store(Request $request)
    {
        FinanceBox::create($request->validate(FinanceBox::rules()));
        return redirect()->route('finance-boxes.index')->with('success', 'تم الإنشاء بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(FinanceBox $financeBox)
    {
        return view('dashboard.finance-boxes.details', compact('financeBox'));
    }

    public function edit(FinanceBox $financeBox)
    {
        $branches = Branch::all();
        $currencies = Currency::all();
        return view('dashboard.finance-boxes.edit', compact('financeBox', 'branches', 'currencies'));
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
