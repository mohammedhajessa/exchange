<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Dashborad\BoxTransactionController;
use App\Models\BoxTransition;
use App\Models\Transfer;
use App\Models\Branch;
use App\Models\Currency;
use App\Models\FinanceBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $branch = Branch::where('user_id', $user->id)->first();
        $transfers = Transfer::with(['branch', 'currency'])->where('branch_id', $branch->id)->latest()->paginate(10);
        return view('dashboard.transfer.index', compact('transfers'));
    }

    public function create()
    {
        $branches = Branch::where('status', 'active')->where('user_id', '!=', Auth::user()->id)->get();
        $currencies = Currency::all();
        return view('dashboard.transfer.create', compact('branches', 'currencies'));
    }

    public function edit(Transfer $transfer)
    {
        $branches = Branch::where('status', 'active')->where('user_id', '!=', Auth::user()->id)->get();
        $currencies = Currency::all();
        return view('dashboard.transfer.edit', compact('transfer', 'branches', 'currencies'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $branch = Branch::where('status', 'active')->where('user_id', $user->id)->first();
        $toBranch = Branch::where('status', 'active')->where('id', $request->to_branch_id)->first();
        $request->validate([
            'to_branch_id' => 'required|exists:branches,id',
            'amount' => 'required|numeric|min:0',
            'fees' => 'required|numeric|min:0',
            'currency_id' => 'required|exists:currencies,id',
            'receiver_name' => 'required|string|max:255',
            'receiver_phone' => 'required|string|max:255',
            'receiver_address' => 'required|string|max:255',
        ]);
        if ($toBranch->finance_box->balance < $request->amount) {
            return redirect()->route('transfers.create')->with('error', 'لا يوجد رصيد كافي للتحويل');
        }
        $financeBox = FinanceBox::where('branch_id', $toBranch->id)->where('currency_id', $request->currency_id)->first();
        if ($request->currency_id != $toBranch->finance_box->currency_id) {
            return redirect()->route('transfers.create')->with('error', 'لا يوجد صندوق في هذه العملة للتحويل');
        }
        BoxTransition::create([
            'branch_id' => $branch->id,
            'currency_id' => $request->currency_id,
            'amount' => $request->amount,
            'fees' => $request->fees,
            'type' => 'transfer',
            'note' => 'تحويل من الفرع ' . $branch->name . ' إلى الفرع ' . Branch::find($request->to_branch_id)->name,
        ]);
        FinanceBox::where('branch_id', $branch->id)->where('currency_id', $request->currency_id)->update([
            'balance' => $branch->finance_box->balance + $request->amount + $request->fees,
        ]);
        FinanceBox::where('branch_id', $toBranch->id)->where('currency_id', $request->currency_id)->update([
            'balance' => $toBranch->finance_box->balance - $request->amount,
        ]);
        Transfer::create($request->all() + ['branch_id' => $branch->id]);
        return redirect()->route('transfers.index')->with('success', 'تم إنشاء التحويل بنجاح');
    }
    public function destroy(Transfer $transfer)
    {
        $transfer->delete();
        return redirect()->route('transfers.index')->with('success', 'تم حذف التحويل بنجاح');
    }

    public function show(Transfer $transfer)
    {
        $transfer->load(['branch', 'currency']);
        return view('dashboard.transfer.show', compact('transfer'));
    }
    public function update(Request $request, Transfer $transfer)
    {
        $request->validate([
            'to_branch_id' => 'required|exists:branches,id',
            'amount' => 'required|numeric|min:0',
            'fees' => 'required|numeric|min:0',
            'currency_id' => 'required|exists:currencies,id',
            'receiver_name' => 'required|string|max:255',
            'receiver_phone' => 'required|string|max:255',
            'receiver_address' => 'required|string|max:255',
        ]);
        $transfer->update($request->all());
        return redirect()->route('transfers.index')->with('success', 'تم تحديث التحويل بنجاح');
        BoxTransition::where('id', $transfer->id)->update([
            'branch_id' => $transfer->branch->id,
            'currency_id' => $transfer->currency_id,
            'amount' => $transfer->amount,
            'fees' => $transfer->fees,
            'type' => 'transfer',
            'note' => 'تحويل من الفرع ' . $transfer->branch->name . ' إلى الفرع ' . Branch::find($request->to_branch_id)->name,
        ]);
    }
    public function updateStatus(Transfer $transfer, $status)
    {
        $transfer->update(['status' => $status]);
        return redirect()->route('transfers.incoming')->with('success', 'تم تحديث حالة التحويل بنجاح');
        BoxTransition::where('id', $transfer->id)->update([
            'status' => $status,
        ]);
    }
    public function incoming()
    {
        $user = Auth::user();
        $branch = Branch::where('user_id', $user->id)->first();
        $transfers = Transfer::with(['branch', 'currency'])->where('to_branch_id', $branch->id)->latest()->paginate(10);
        return view('dashboard.transfer.incoming', compact('transfers'));
    }
}
