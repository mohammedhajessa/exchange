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

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(Branch::all());
        }
        return view('dashboard.branches.index');
    }

    public function show($id)
    {
        return response()->json(Branch::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'town' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'note' => 'nullable|string|max:500',
            'status' => 'required|boolean',
        ]);

        Branch::create($request->only(
            'name',
            'country',
            'city',
            'town',
            'address',
            'phone',
            'note',
            'status'
        ));

        return response()->json(['message' => 'Branch created successfully!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'town' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'note' => 'nullable|string|max:500',
            'status' => 'required|boolean',
        ]);

        $branch = Branch::findOrFail($id);
        $branch->update($request->only(
            'name',
            'country',
            'city',
            'town',
            'address',
            'phone',
            'note',
            'status'
        ));

        return response()->json(['message' => 'Branch updated successfully!']);
    }

    public function destroy($id)
    {
        Branch::findOrFail($id)->delete();

        return response()->json(['message' => 'Branch deleted successfully!']);
    }

}

