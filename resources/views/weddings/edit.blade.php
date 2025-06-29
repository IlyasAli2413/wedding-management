@extends('layouts.app')
@section('title', 'Edit Wedding')

@section('content')
<h2>Edit Wedding</h2>

<form action="{{ route('weddings.update', $wedding->Wedding_ID) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Event Type</label>
        <input type="text" name="Event_Type" class="form-control" value="{{ $wedding->Event_Type }}" required>
    </div>
    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="Date" class="form-control" value="{{ $wedding->Date }}" required>
    </div>
    <div class="mb-3">
        <label>Client Contact</label>
        <input type="text" name="Client_Contact" class="form-control" value="{{ $wedding->Client_Contact }}" required>
    </div>
    <div class="mb-3">
        <label>Venue</label>
        <select name="Venue_ID" class="form-control" required>
            @foreach ($venues as $venue)
                <option value="{{ $venue->Venue_ID }}" {{ $wedding->Venue_ID == $venue->Venue_ID ? 'selected' : '' }}>
                    {{ $venue->Name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('weddings.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
