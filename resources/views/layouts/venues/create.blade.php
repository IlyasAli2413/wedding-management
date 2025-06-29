@extends('layouts.app')

@section('content')
<h2>Add New Venue</h2>

<form action="{{ route('venues.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Location</label>
        <input type="text" name="location" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Capacity</label>
        <input type="number" name="capacity" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('venues.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
