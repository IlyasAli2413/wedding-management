@extends('layouts.app')
@section('title', 'Add Client')

@section('content')
<h2>Add New Client</h2>

<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="Name">Client Name</label>
        <input type="text" name="Name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="Contact">Contact</label>
        <input type="text" name="Contact" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="Address">Address</label>
        <textarea name="Address" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Save Client</button>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
