@extends('layouts.app')
@section('title', 'Wedding Servers')

@section('content')
<h2 style="margin-bottom: 20px;">Wedding Servers</h2>

<a href="{{ route('weddingservers.create') }}" style="display: inline-block; margin-bottom: 15px; padding: 8px 16px; background-color: green; color: white; text-decoration: none;">Add Server</a>

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #ddd; padding: 8px;">Staff ID</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Assigned Section</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($servers as $server)
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $server->Staffmember_ID }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $server->staffMember->Name ?? 'N/A' }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $server->Assigned_Section }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">
                <a href="{{ route('weddingservers.show', $server->Staffmember_ID) }}" style="padding: 4px 8px; background-color: #17a2b8; color: white; text-decoration: none;">View</a>
                <a href="{{ route('weddingservers.edit', $server->Staffmember_ID) }}" style="padding: 4px 8px; background-color: orange; color: white; text-decoration: none;">Edit</a>
                <form action="{{ route('weddingservers.destroy', $server->Staffmember_ID) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button style="padding: 4px 8px; background-color: red; color: white; border: none;" onclick="return confirm('Delete this server?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" style="text-align: center;">No servers found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
