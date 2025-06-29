@extends('layouts.app')
@section('title', 'Venue List')

@section('content')

<style>
    .venue-container {
        max-width: 1100px;
        margin: 30px auto;
        padding: 20px;
        background: #fdfdfd;
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        font-family: Arial, sans-serif;
    }

    .venue-container h2 {
        margin-bottom: 25px;
        color: #2c3e50;
        text-align: center;
    }

    .btn-primary {
        margin-bottom: 15px;
        background-color: #28a745;
        border: none;
    }

    .btn-sm {
        margin-right: 4px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
    }

    .table thead {
        background-color: #343a40;
        color: #fff;
    }

    .table th, .table td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #dee2e6;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
    }

    .btn-warning {
        background-color: #ffc107;
        border: none;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn:hover {
        opacity: 0.9;
    }
</style>

<div class="venue-container">
    <h2>{{ Auth::user()->isAdmin() ? 'Venue List' : 'Available Venues' }}</h2>

    @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.venues.create') }}" class="btn btn-primary">Add New Venue</a>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Capacity</th>
                @if(Auth::user()->isAdmin())
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($venues as $venue)
            <tr>
                <td>{{ $venue->Venue_ID }}</td>
                <td>{{ $venue->Name }}</td>
                <td>{{ $venue->Location }}</td>
                <td>{{ $venue->Capacity }}</td>
                @if(Auth::user()->isAdmin())
                    <td>
                        <a href="{{ route('admin.venues.show', $venue->Venue_ID) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.venues.edit', $venue->Venue_ID) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.venues.destroy', $venue->Venue_ID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this venue?')">Delete</button>
                        </form>
                    </td>
                @else
                    <td>
                        <a href="{{ route('user.venues.show', $venue->Venue_ID) }}" class="btn btn-info btn-sm">View Details</a>
                    </td>
                @endif
            </tr>
            @empty
            <tr><td colspan="{{ Auth::user()->isAdmin() ? '5' : '4' }}">No venues found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
