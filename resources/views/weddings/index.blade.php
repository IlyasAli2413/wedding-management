@extends('layouts.app')
@section('title', 'Wedding List')

@section('content')
<h2>Wedding List</h2>
<a href="{{ route('weddings.create') }}" class="btn btn-primary mb-3">Add New Wedding</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Event Type</th>
            <th>Date</th>
            <th>Venue</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($weddings as $wedding)
        <tr>
            <td>{{ $wedding->Wedding_ID }}</td>
            <td>{{ $wedding->Event_Type }}</td>
            <td>{{ $wedding->Date }}</td>
            <td>{{ $wedding->venue->Name ?? 'N/A' }}</td>
            <td>{{ $wedding->Client_Contact }}</td>
            <td>
                <a href="{{ route('weddings.show', $wedding->Wedding_ID) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('weddings.edit', $wedding->Wedding_ID) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('weddings.destroy', $wedding->Wedding_ID) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
