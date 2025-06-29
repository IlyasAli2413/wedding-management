@extends('layouts.app')
@section('title', 'Edit Wedding Venue Mapping')

@section('content')
<h2 style="margin-bottom: 20px;">Edit Wedding Venue Mapping</h2>

<form method="POST" action="{{ route('wedding_venue_mappings.update', [$mapping->wedding_id, $mapping->venue_id]) }}" style="max-width: 500px;">
    @csrf
    @method('PUT')
    <div style="margin-bottom: 15px;">
        <label style="font-weight: bold;">Wedding</label>
        <select name="wedding_id" style="width: 100%; padding: 8px;" required>
            @foreach($weddings as $wedding)
                <option value="{{ $wedding->Wedding_ID }}" {{ $mapping->wedding_id == $wedding->Wedding_ID ? 'selected' : '' }}>
                    {{ $wedding->Event_Type }} - {{ $wedding->Date }}
                </option>
            @endforeach
        </select>
    </div>
    <div style="margin-bottom: 15px;">
        <label style="font-weight: bold;">Venue</label>
        <select name="venue_id" style="width: 100%; padding: 8px;" required>
            @foreach($venues as $venue)
                <option value="{{ $venue->Venue_ID }}" {{ $mapping->venue_id == $venue->Venue_ID ? 'selected' : '' }}>
                    {{ $venue->Name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" style="background-color: #007bff; color: white; padding: 10px 16px; border: none; border-radius: 4px;">Update</button>
    <a href="{{ route('wedding_venue_mappings.index') }}" style="padding: 10px 16px; margin-left: 10px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Cancel</a>
</form>
@endsection
