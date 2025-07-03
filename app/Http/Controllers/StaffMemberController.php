<?php

namespace App\Http\Controllers;

use App\Models\StaffMember;
use Illuminate\Http\Request;

class StaffMemberController extends Controller
{
    public function index()
    {
        $staffmembers = StaffMember::all();
        return view('staffmembers.index', compact('staffmembers'));
    }

    public function create()
    {
        return view('staffmembers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Address' => 'required|string',
            'Salary' => 'required|numeric|min:0',
        ]);

        StaffMember::create($validated);
        return redirect()->route('admin.staffmembers.index')->with('success', 'Staff member added.');
    }

    public function show(StaffMember $staffmember)
    {
        return view('staffmembers.show', compact('staffmember'));
    }

    public function edit(StaffMember $staffmember)
    {
        return view('staffmembers.edit', compact('staffmember'));
    }

    public function update(Request $request, StaffMember $staffmember)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Address' => 'required|string',
            'Salary' => 'required|numeric|min:0',
        ]);

        $staffmember->update($validated);
        return redirect()->route('admin.staffmembers.index')->with('success', 'Staff member updated.');
    }

    public function destroy(StaffMember $staffmember)
    {
        $staffmember->delete();
        return redirect()->route('admin.staffmembers.index')->with('success', 'Staff member deleted.');
    }
}
