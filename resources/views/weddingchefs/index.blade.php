@extends('layouts.app')
@section('title', 'Wedding Chefs')

@section('content')
<h2 style="margin-bottom: 20px;">Wedding Chefs</h2>

<a href="{{ route('weddingchefs.create') }}" 
   style="display: inline-block; margin-bottom: 15px; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">
   Add Chef
</a>

<table style="width: 100%; border-collapse: collapse; border: 1px solid #ccc; font-size: 16px;">
    <thead style="background-color: #f2f2f2;">
        <tr>
            <th style="padding: 10px; border: 1px solid #ccc;">Staff ID</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Name</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Speciality</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($chefs as $chef)
        <tr>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $chef->Staffmember_ID }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $chef->staffMember->Name ?? 'N/A' }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">{{ $chef->Speciality }}</td>
            <td style="padding: 10px; border: 1px solid #ccc;">
                <a href="{{ route('weddingchefs.show', $chef->Staffmember_ID) }}" 
                   style="padding: 5px 10px; background-color: #17a2b8; color: white; text-decoration: none; border-radius: 3px; margin-right: 5px;">
                   View
                </a>
                <a href="{{ route('weddingchefs.edit', $chef->Staffmember_ID) }}" 
                   style="padding: 5px 10px; background-color: #ffc107; color: black; text-decoration: none; border-radius: 3px; margin-right: 5px;">
                   Edit
                </a>
                <form action="{{ route('weddingchefs.destroy', $chef->Staffmember_ID) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Delete this chef?')" 
                            style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; border-radius: 3px;">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="padding: 10px; text-align: center;">No chefs found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
