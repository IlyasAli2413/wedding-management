<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Requests\StoreWeddingRequest;
use App\Http\Requests\UpdateWeddingRequest;

class WeddingController extends Controller
{
    public function index()
    {
        $weddings = Wedding::with('venue')->get();
        return view('weddings.index', compact('weddings'));
    }

    public function create()
    {
        $venues = Venue::all();
        return view('weddings.create', compact('venues'));
    }

    public function store(StoreWeddingRequest $request)
    {
        Wedding::create($request->validated());
        return redirect()->route('weddings.index')->with('success', 'Wedding created successfully.');
    }

    public function show(Wedding $wedding)
    {
        return view('weddings.show', compact('wedding'));
    }

    public function edit(Wedding $wedding)
    {
        $venues = Venue::all();
        return view('weddings.edit', compact('wedding', 'venues'));
    }

    public function update(UpdateWeddingRequest $request, Wedding $wedding)
    {
        $wedding->update($request->validated());
        return redirect()->route('weddings.index')->with('success', 'Wedding updated.');
    }

    public function destroy(Wedding $wedding)
    {
        $wedding->delete();
        return redirect()->route('weddings.index')->with('success', 'Wedding deleted.');
    }
}

