@extends('layouts.app')
@section('title', 'Guest List')

@section('content')
<h2>Guest List</h2>

<a href="{{ route('guests.create') }}" class="btn btn-primary mb-3">Add New Guest</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Wedding</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($guests as $guest)
        <tr>
            <td>{{ $guest->Guest_ID }}</td>
            <td>{{ $guest->wedding->Event_Type ?? 'N/A' }}</td>
            <td>{{ $guest->Name }}</td>
            <td>{{ $guest->Contact }}</td>
            <td>{{ $guest->Address }}</td>
            <td>
                <a href="{{ route('guests.show', $guest->Guest_ID) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('guests.edit', $guest->Guest_ID) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('guests.destroy', $guest->Guest_ID) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6">No guests found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
