@extends('layouts.app')
@section('title', 'Client List')

@section('content')
    <h2 style="margin-bottom: 20px;">Client List</h2>

    <a href="{{ route('admin.clients.create') }}" style="display: inline-block; margin-bottom: 20px; padding: 8px 16px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px;">Add Client</a>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Contact</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Address</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $client->Client_ID }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $client->Name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $client->Contact }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $client->Address }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="{{ route('admin.clients.show', $client->Client_ID) }}" style="padding: 4px 8px; background-color: #17a2b8; color: white; text-decoration: none; border-radius: 4px;">View</a>
                        <a href="{{ route('admin.clients.edit', $client->Client_ID) }}" style="padding: 4px 8px; background-color: #ffc107; color: black; text-decoration: none; border-radius: 4px;">Edit</a>
                        <form action="{{ route('admin.clients.destroy', $client->Client_ID) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this client?')" style="padding: 4px 8px; background-color: #dc3545; color: white; border: none; border-radius: 4px;">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="border: 1px solid #ddd; padding: 8px; text-align: center;">No clients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
