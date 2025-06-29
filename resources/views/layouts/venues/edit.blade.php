@extends('layouts.app')

@section('content')
<h2>Edit Venue</h2>

<form action="{{ route('venues.update', $venue->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $venue->name }}" required>
    </div>
    <div class="mb-3">
        <label>Location</label>
        <input type="text" name="location" class="form-control" value="{{ $venue->location }}" required>
    </div>
    <div class="mb-3">
        <label>Capacity</label>
        <input type="number" name="capacity" class="form-control" value="{{ $venue->capacity }}" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('venues.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
