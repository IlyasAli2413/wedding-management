<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenueController extends Controller
{
    // 🔧 Ensure route model binding uses 'Venue_ID' instead of 'id'
    public function getRouteKeyName()
    {
        return 'Venue_ID';
    }

    // ✅ List all venues with optional search (Admin)
    public function index(Request $request)
    {
        $query = Venue::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('Name', 'like', "%$search%")
                  ->orWhere('Location', 'like', "%$search%");
        }

        $venues = $query->get();
        return view('venues.index', compact('venues'));
    }

    // ✅ List venues for user selection (User)
    public function userIndex(Request $request)
    {
        $query = Venue::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('Name', 'like', "%$search%")
                  ->orWhere('Location', 'like', "%$search%");
        }

        $venues = $query->get();
        return view('venues.index', compact('venues'));
    }

    // ✅ Show create form
    public function create()
    {
        return view('venues.create');
    }

    // ✅ Store a new venue
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name'     => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'Capacity' => 'required|numeric|min:0',
        ]);

        Venue::create($validated);

        return redirect()->route('admin.venues.index')->with('success', 'Venue added successfully.');
    }

    // ✅ Show a single venue
    public function show(Venue $venue)
    {
        return view('venues.show', compact('venue'));
    }

    // ✅ Show a single venue for users (read-only)
    public function userShow(Venue $venue)
    {
        return view('venues.show', compact('venue'));
    }

    // ✅ Show edit form
    public function edit(Venue $venue)
    {
        return view('venues.edit', compact('venue'));
    }

    // ✅ Update a venue
    public function update(Request $request, Venue $venue)
    {
        $validated = $request->validate([
            'Name'     => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'Capacity' => 'required|numeric|min:0',
        ]);

        $venue->update($validated);

        return redirect()->route('admin.venues.index')->with('success', 'Venue updated successfully.');
    }

    // ✅ Delete a venue
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return redirect()->route('admin.venues.index')->with('success', 'Venue deleted successfully.');
    }
}
