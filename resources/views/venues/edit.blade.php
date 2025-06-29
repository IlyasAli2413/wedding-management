@extends('layouts.app')
@section('title', 'Edit Venue')

@section('content')

<style>
    .edit-venue-container {
        max-width: 600px;
        margin: 40px auto;
        background: #fdfdfd;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .edit-venue-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #2c3e50;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 15px;
    }

    .btn-update {
        background-color: #007bff;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-update:hover {
        background-color: #0069d9;
    }

    .btn-cancel {
        background-color: #6c757d;
        color: white;
        padding: 10px 16px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        text-decoration: none;
        margin-left: 10px;
    }

    .btn-cancel:hover {
        background-color: #5a6268;
    }
</style>

<div class="edit-venue-container">
    <h2>Edit Venue</h2>

    @if(Auth::user()->isAdmin())
        <form action="{{ route('admin.venues.update', $venue->Venue_ID) }}" method="POST">
    @else
        <form action="{{ route('user.venues.update', $venue->Venue_ID) }}" method="POST">
    @endif
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Name" class="form-label">Venue Name</label>
            <input type="text" name="Name" value="{{ $venue->Name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Location" class="form-label">Location</label>
            <input type="text" name="Location" value="{{ $venue->Location }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Capacity" class="form-label">Capacity</label>
            <input type="number" name="Capacity" value="{{ $venue->Capacity }}" class="form-control" required>
        </div>

        <button type="submit" class="btn-update">Update Venue</button>
        @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.venues.index') }}" class="btn-cancel">Cancel</a>
        @else
            <a href="{{ route('user.venues.index') }}" class="btn-cancel">Cancel</a>
        @endif
    </form>
</div>

@endsection
