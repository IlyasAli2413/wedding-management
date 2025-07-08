@extends('layouts.app')
@section('title', 'Add Client')

@section('content')
    <h2 style="margin-bottom: 20px;">Add New Client</h2>

    <form action="{{ route('admin.clients.store') }}" method="POST" style="max-width: 600px;">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="Name" style="display: block;">Client Name</label>
            <input type="text" name="Name" class="form-control" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="Contact" style="display: block;">Contact</label>
            <input type="text" name="Contact" class="form-control" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="Address" style="display: block;">Address</label>
            <textarea name="Address" class="form-control" rows="3" required style="width: 100%; padding: 8px;"></textarea>
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px;">Add Client</button>
        <a href="{{ route('admin.clients.index') }}" style="padding: 10px 20px; background-color: gray; color: white; text-decoration: none; border-radius: 4px;">Cancel</a>
    </form>
@endsection
