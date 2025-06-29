<?php

namespace App\Http\Controllers;

use App\Models\WeddingChef;
use Illuminate\Http\Request;

class WeddingChefController extends Controller
{
    public function index()
    {
        $chefs = WeddingChef::with('staff')->get(); // Eager load the related staff member
        return view('weddingchefs.index', compact('chefs'));
    }

    public function show($id)
    {
        $chef = WeddingChef::with('staff')->findOrFail($id);
        return view('weddingchefs.show', compact('chef'));
    }

    public function create()
    {
        // You can pass staff list here if needed
        return view('weddingchefs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Staffmember_ID' => 'required|exists:staffmember,Staffmember_ID',
            'Speciality' => 'required|string|max:255',
        ]);

        WeddingChef::create($request->all());

        return redirect()->route('weddingchefs.index')->with('success', 'Wedding Chef added successfully.');
    }

    public function edit($id)
    {
        $chef = WeddingChef::findOrFail($id);
        return view('weddingchefs.edit', compact('chef'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Speciality' => 'required|string|max:255',
        ]);

        $chef = WeddingChef::findOrFail($id);
        $chef->update($request->all());

        return redirect()->route('weddingchefs.index')->with('success', 'Wedding Chef updated successfully.');
    }

    public function destroy($id)
    {
        $chef = WeddingChef::findOrFail($id);
        $chef->delete();

        return redirect()->route('weddingchefs.index')->with('success', 'Wedding Chef deleted successfully.');
    }
}
