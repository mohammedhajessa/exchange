<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::query();
        if (request('status')) {
            $branches->where('status', request('status'));
        }
        if (request('country')) {
            $branches->where('country', request('country'));
        }
        $branches = $branches->get();
        return view('dashboard.branches.index' , [
            'branches' => $branches,
        ]);
    }

    public function show(Branch $branch)
    {
        $branch = Branch::with('user')->find($branch->id);
        return view('dashboard.branches.details' , compact('branch'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'town' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'note' => 'nullable|string|max:500',
            'start_time' => 'nullable|string|max:255',
            'end_time' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $branch = Branch::create($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $branch->user_id = $user->id;
        $branch->save();
        return redirect()->route('branches.index')->with('success', 'تم الإنشاء بجاح');
    }

    public function edit(Branch $branch)
    {
        $branch = Branch::with('user')->find($branch->id);
        return response()->json($branch);
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'town' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'note' => 'nullable|string|max:500',
            'start_time' => 'nullable|string|max:255',
            'end_time' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $branch->update($request->all());
        $user = User::find($branch->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $branch->save();
        $user->save();

        return redirect()->route('branches.index')->with('success', 'تم التعديل بجاح');
    }

    public function destroy(Branch $branch)
    {
        $branch->user()->delete();
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'تم الحذف بجاح');
    }
}
