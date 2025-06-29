@extends('layouts.app')
@section('title', 'Add Venue')

@section('content')

<style>
    .venue-form-container {
        max-width: 600px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .venue-form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 15px;
    }

    .btn-submit {
        background-color: #28a745;
        color: #fff;
        padding: 10px 16px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #218838;
    }

    .btn-cancel {
        background-color: #6c757d;
        color: #fff;
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

<div class="venue-form-container">
    <h2>Add New Venue</h2>

    @if(Auth::user()->isAdmin())
        <form action="{{ route('admin.venues.store') }}" method="POST">
    @else
        <form action="{{ route('user.venues.store') }}" method="POST">
    @endif
        @csrf
        <div class="form-group">
            <label for="Name" class="form-label">Venue Name</label>
            <input type="text" name="Name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Location" class="form-label">Location</label>
            <input type="text" name="Location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Capacity" class="form-label">Capacity</label>
            <input type="number" name="Capacity" class="form-control" required>
        </div>
        <button type="submit" class="btn-submit">Save Venue</button>
        @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.venues.index') }}" class="btn-cancel">Cancel</a>
        @else
            <a href="{{ route('user.venues.index') }}" class="btn-cancel">Cancel</a>
        @endif
    </form>
</div>

@endsection
