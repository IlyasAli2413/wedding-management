@extends('layouts.app')
@section('title', 'Client List')

@section('content')
<h2>Client List</h2>

<a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Add New Client</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($clients as $client)
        <tr>
            <td>{{ $client->Client_ID }}</td>
            <td>{{ $client->Name }}</td>
            <td>{{ $client->Contact }}</td>
            <td>{{ $client->Address }}</td>
            <td>
                <a href="{{ route('clients.show', $client->Client_ID) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('clients.edit', $client->Client_ID) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('clients.destroy', $client->Client_ID) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this client?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5">No clients found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
