@extends('layouts.app')
@section('title', 'Edit Client')

@section('content')
<h2>Edit Client</h2>

<form action="{{ route('clients.update', $client->Client_ID) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="Name">Client Name</label>
        <input type="text" name="Name" class="form-control" value="{{ $client->Name }}" required>
    </div>
    <div class="mb-3">
        <label for="Contact">Contact</label>
        <input type="text" name="Contact" class="form-control" value="{{ $client->Contact }}" required>
    </div>
    <div class="mb-3">
        <label for="Address">Address</label>
        <textarea name="Address" class="form-control" rows="3" required>{{ $client->Address }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Client</button>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
