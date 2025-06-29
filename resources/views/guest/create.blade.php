@extends('layouts.app')
@section('title', 'Add Guest')

@section('content')
<h2>Add New Guest</h2>

<form action="{{ route('guests.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Guest Name</label>
        <input type="text" name="Name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Contact</label>
        <input type="text" name="Contact" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="Address" class="form-control" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label>Wedding</label>
        <select name="Wedding_ID" class="form-control" required>
            <option value="">-- Select Wedding --</option>
            @foreach ($weddings as $wedding)
                <option value="{{ $wedding->Wedding_ID }}">{{ $wedding->Event_Type }} - {{ $wedding->Date }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Save Guest</button>
    <a href="{{ route('guests.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
