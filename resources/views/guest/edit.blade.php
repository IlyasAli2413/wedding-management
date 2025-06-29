@extends('layouts.app')
@section('title', 'Edit Guest')

@section('content')
<h2>Edit Guest</h2>

<form action="{{ route('guests.update', $guest->Guest_ID) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Guest Name</label>
        <input type="text" name="Name" class="form-control" value="{{ $guest->Name }}" required>
    </div>
    <div class="mb-3">
        <label>Contact</label>
        <input type="text" name="Contact" class="form-control" value="{{ $guest->Contact }}" required>
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="Address" class="form-control" rows="3" required>{{ $guest->Address }}</textarea>
    </div>
    <div class="mb-3">
        <label>Wedding</label>
        <select name="Wedding_ID" class="form-control" required>
            @foreach ($weddings as $wedding)
                <option value="{{ $wedding->Wedding_ID }}"
                    {{ $guest->Wedding_ID == $wedding->Wedding_ID ? 'selected' : '' }}>
                    {{ $wedding->Event_Type }} - {{ $wedding->Date }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Guest</button>
    <a href="{{ route('guests.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
