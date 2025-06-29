@extends('layouts.app')
@section('title', 'Add Wedding')

@section('content')
<h2>Add New Wedding</h2>

<form action="{{ route('weddings.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Event Type</label>
        <input type="text" name="Event_Type" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="Date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Client Contact</label>
        <input type="text" name="Client_Contact" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Venue</label>
        <select name="Venue_ID" class="form-control" required>
            <option value="">-- Select Venue --</option>
            @foreach ($venues as $venue)
                <option value="{{ $venue->Venue_ID }}">{{ $venue->Name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('weddings.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
