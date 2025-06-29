@extends('layouts.app')
@section('title', 'Edit Wedding Event Menu')

@section('content')
<h2>Edit Assigned Menu Item</h2>

<form action="{{ route('wedding_events.update', [$event->Order_ID, $event->MenuItem_ID]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="Quantity" class="form-control" value="{{ $event->Quantity }}" required>
    </div>
    <div class="mb-3">
        <label>Special Notes</label>
        <textarea name="Special_Notes" class="form-control">{{ $event->Special_Notes }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('wedding_events.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
