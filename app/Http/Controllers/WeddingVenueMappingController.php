<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeddingVenueMapping;
use App\Models\Wedding;
use App\Models\Venue;

class WeddingVenueMappingController extends Controller
{
    public function index()
    {
        $mappings = WeddingVenueMapping::with(['wedding', 'venue'])->get();
        return view('wedding_venue_mappings.index', compact('mappings'));
    }

    public function create()
    {
        $weddings = Wedding::all();
        $venues = Venue::all();
        return view('wedding_venue_mappings.create', compact('weddings', 'venues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'wedding_id' => 'required|exists:wedding,Wedding_ID',
            'venue_id' => 'required|exists:venue,Venue_ID',
        ]);

        WeddingVenueMapping::create($request->only('wedding_id', 'venue_id'));

        return redirect()->route('wedding_venue_mappings.index')->with('success', 'Mapping created.');
    }

    public function show($wedding_id, $venue_id)
    {
        $mapping = WeddingVenueMapping::where('wedding_id', $wedding_id)->where('venue_id', $venue_id)->with(['wedding', 'venue'])->firstOrFail();
        return view('wedding_venue_mappings.show', compact('mapping'));
    }

    public function edit($wedding_id, $venue_id)
    {
        $mapping = WeddingVenueMapping::where('wedding_id', $wedding_id)->where('venue_id', $venue_id)->firstOrFail();
        $weddings = Wedding::all();
        $venues = Venue::all();
        return view('wedding_venue_mappings.edit', compact('mapping', 'weddings', 'venues'));
    }

    public function update(Request $request, $wedding_id, $venue_id)
    {
        $request->validate([
            'wedding_id' => 'required|exists:wedding,Wedding_ID',
            'venue_id' => 'required|exists:venue,Venue_ID',
        ]);

        $mapping = WeddingVenueMapping::where('wedding_id', $wedding_id)->where('venue_id', $venue_id)->firstOrFail();

        // Delete old and create new if changed
        $mapping->delete();
        WeddingVenueMapping::create($request->only('wedding_id', 'venue_id'));

        return redirect()->route('wedding_venue_mappings.index')->with('success', 'Mapping updated.');
    }

    public function destroy($wedding_id, $venue_id)
    {
        $mapping = WeddingVenueMapping::where('wedding_id', $wedding_id)->where('venue_id', $venue_id)->firstOrFail();
        $mapping->delete();
        return redirect()->route('wedding_venue_mappings.index')->with('success', 'Mapping deleted.');
    }
}
