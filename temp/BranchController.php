<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:create-branch')->only('store');
    // }

    public function index()
    {
        $branches = Branch::all();
        return view('dashboard.branches.index' , [
            'branches' => $branches,
        ]);
    }

    public function show(Branch $branch)
    {
        return view('dashboard.branches.details' , compact('branch'));
    }

    public function store(Request $request)
    {
        // dd($request->only('status'));
        Branch::create($request->validate(Branch::rules()));

        return redirect()->route('branches.index')->with('success', 'تم الإنشاء بجاح');
    }

    public function edit(Branch $branch)
    {
        return response()->json($branch);
    }

    public function update(Request $request, Branch $branch)
    {

        $branch->update($request->validate(Branch::rules()));

        return redirect()->route('branches.index')->with('success', 'تم التعديل بجاح');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'تم الحذف بجاح');
    }

}

