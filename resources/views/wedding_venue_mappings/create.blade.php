@extends('layouts.app')
@section('title', 'Add Wedding Venue Mapping')

@section('content')
<h2 style="margin-bottom: 20px;">Add Wedding Venue Mapping</h2>

<form method="POST" action="{{ route('wedding_venue_mappings.store') }}" style="max-width: 500px;">
    @csrf
    <div style="margin-bottom: 15px;">
        <label style="font-weight: bold;">Wedding</label>
        <select name="wedding_id" style="width: 100%; padding: 8px;" required>
            <option value="">Select Wedding</option>
            @foreach($weddings as $wedding)
                <option value="{{ $wedding->Wedding_ID }}">{{ $wedding->Event_Type }} - {{ $wedding->Date }}</option>
            @endforeach
        </select>
    </div>
    <div style="margin-bottom: 15px;">
        <label style="font-weight: bold;">Venue</label>
        <select name="venue_id" style="width: 100%; padding: 8px;" required>
            <option value="">Select Venue</option>
            @foreach($venues as $venue)
                <option value="{{ $venue->Venue_ID }}">{{ $venue->Name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" style="background-color: #28a745; color: white; padding: 10px 16px; border: none; border-radius: 4px;">Save</button>
    <a href="{{ route('wedding_venue_mappings.index') }}" style="padding: 10px 16px; margin-left: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Cancel</a>
</form>
@endsection
