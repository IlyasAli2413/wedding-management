<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use App\Models\StaffMember;
use App\Models\WeddingStaffAssignment;
use Illuminate\Http\Request;

class WeddingStaffAssignmentController extends Controller
{
    public function index()
    {
        $assignments = WeddingStaffAssignment::with(['wedding', 'staffMember'])->get();
        return view('wedding_staff_assignments.index', compact('assignments'));
    }

    public function create()
    {
        $weddings = Wedding::all();
        $staffMembers = StaffMember::all();
        return view('wedding_staff_assignments.create', compact('weddings', 'staffMembers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Wedding_ID' => 'required|exists:wedding,Wedding_ID',
            'Staffmember_ID' => 'required|exists:staffmember,Staffmember_ID',
            'Role' => 'required|string|max:100',
            'Shift_Time' => 'required|string|max:50',
        ]);

        WeddingStaffAssignment::create($request->all());

        return redirect()->route('wedding_staff_assignments.index')->with('success', 'Staff assigned successfully.');
    }

    public function show($weddingId, $staffId)
    {
        $assignment = WeddingStaffAssignment::with(['wedding', 'staffMember'])
            ->where('Wedding_ID', $weddingId)
            ->where('Staffmember_ID', $staffId)
            ->firstOrFail();

        return view('wedding_staff_assignments.show', compact('assignment'));
    }

    public function edit($weddingId, $staffId)
    {
        $assignment = WeddingStaffAssignment::where('Wedding_ID', $weddingId)
            ->where('Staffmember_ID', $staffId)
            ->firstOrFail();

        return view('wedding_staff_assignments.edit', compact('assignment'));
    }

    public function update(Request $request, $weddingId, $staffId)
    {
        $request->validate([
            'Role' => 'required|string|max:100',
            'Shift_Time' => 'required|string|max:50',
        ]);

        $assignment = WeddingStaffAssignment::where('Wedding_ID', $weddingId)
            ->where('Staffmember_ID', $staffId)
            ->firstOrFail();

        $assignment->update($request->only(['Role', 'Shift_Time']));

        return redirect()->route('wedding_staff_assignments.index')->with('success', 'Assignment updated.');
    }

    public function destroy($weddingId, $staffId)
    {
        $assignment = WeddingStaffAssignment::where('Wedding_ID', $weddingId)
            ->where('Staffmember_ID', $staffId)
            ->firstOrFail();

        $assignment->delete();

        return redirect()->route('wedding_staff_assignments.index')->with('success', 'Assignment removed.');
    }
}
