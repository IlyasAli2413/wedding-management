<?php

namespace App\Http\Controllers;

use App\Models\WeddingPlanner;
use App\Models\StaffMember;
use Illuminate\Http\Request;

class WeddingPlannerController extends Controller
{
    public function index()
    {
        $planners = WeddingPlanner::with('staffMember')->get();
        return view('weddingplanners.index', compact('planners'));
    }

    public function create()
    {
        $staffmembers = StaffMember::all();
        return view('weddingplanners.create', compact('staffmembers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Staffmember_ID' => 'required|exists:staffmember,Staffmember_ID|unique:weddingplanner,Staffmember_ID',
            'Managed_Events_Count' => 'required|integer|min:0',
        ]);

        WeddingPlanner::create($validated);
        return redirect()->route('weddingplanners.index')->with('success', 'Wedding Planner added.');
    }

    public function show($id)
    {
        $planner = WeddingPlanner::with('staffMember')->findOrFail($id);
        return view('weddingplanners.show', compact('planner'));
    }

    public function edit($id)
    {
        $planner = WeddingPlanner::findOrFail($id);
        return view('weddingplanners.edit', compact('planner'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Managed_Events_Count' => 'required|integer|min:0',
        ]);

        $planner = WeddingPlanner::findOrFail($id);
        $planner->update($validated);

        return redirect()->route('weddingplanners.index')->with('success', 'Planner updated.');
    }

    public function destroy($id)
    {
        $planner = WeddingPlanner::findOrFail($id);
        $planner->delete();

        return redirect()->route('weddingplanners.index')->with('success', 'Planner removed.');
    }
}
