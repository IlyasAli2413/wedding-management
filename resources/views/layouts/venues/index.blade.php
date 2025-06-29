@extends('layouts.app')

@section('content')
<h2>Venue List</h2>
<a href="{{ route('venues.create') }}" class="btn btn-primary mb-3">Add New Venue</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Capacity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($venues as $venue)
        <tr>
            <td>{{ $venue->id }}</td>
            <td>{{ $venue->name }}</td>
            <td>{{ $venue->location }}</td>
            <td>{{ $venue->capacity }}</td>
            <td>
                <a href="{{ route('venues.show', $venue->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('venues.destroy', $venue->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
