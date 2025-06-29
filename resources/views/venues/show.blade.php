@extends('layouts.app')
@section('title', 'Venue Details')

@section('content')

<style>
    .venue-details-container {
        max-width: 700px;
        margin: 30px auto;
        padding: 25px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .venue-details-container h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    .list-group-item {
        padding: 14px 20px;
        font-size: 16px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
    }

    .list-group-item strong {
        width: 120px;
        display: inline-block;
        color: #333;
    }

    .btn-secondary {
        display: inline-block;
        margin-top: 15px;
        background-color: #6c757d;
        border: none;
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn-secondary:hover {
        opacity: 0.9;
    }
</style>

<div class="venue-details-container">
    <h2>Venue Details</h2>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>ID:</strong> {{ $venue->Venue_ID }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $venue->Name }}</li>
        <li class="list-group-item"><strong>Location:</strong> {{ $venue->Location }}</li>
        <li class="list-group-item"><strong>Capacity:</strong> {{ $venue->Capacity }}</li>
    </ul>

    @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.venues.index') }}" class="btn btn-secondary">← Back</a>
    @else
        <a href="{{ route('user.venues.index') }}" class="btn btn-secondary">← Back</a>
    @endif
</div>
@endsection
