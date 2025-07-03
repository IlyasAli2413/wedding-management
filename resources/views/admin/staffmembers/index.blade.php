@extends('layouts.app')
@section('title', 'Staff Members')

@section('content')
<h2 style="margin-bottom: 20px;">Staff Members</h2>

<a href="{{ route('admin.staffmembers.create') }}" style="background-color: #0d6efd; color: white; padding: 8px 15px; text-decoration: none; margin-bottom: 10px; display: inline-block;">+ Add Staff Member</a>

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #ccc; padding: 10px;">ID</th>
            <th style="border: 1px solid #ccc; padding: 10px;">Name</th>
            <th style="border: 1px solid #ccc; padding: 10px;">Address</th>
            <th style="border: 1px solid #ccc; padding: 10px;">Salary</th>
            <th style="border: 1px solid #ccc; padding: 10px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($staffmembers as $member)
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->Staffmember_ID }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->Name }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->Address }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->Salary }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">
                <a href="{{ route('admin.staffmembers.show', $member->Staffmember_ID) }}" style="background-color: #17a2b8; color: white; padding: 5px 10px; text-decoration: none;">View</a>
                <a href="{{ route('admin.staffmembers.edit', $member->Staffmember_ID) }}" style="background-color: #ffc107; color: black; padding: 5px 10px; text-decoration: none;">Edit</a>
                <form action="{{ route('admin.staffmembers.destroy', $member->Staffmember_ID) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this staff member?')" style="background-color: red; color: white; padding: 5px 10px; border: none;">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align: center;">No staff members found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
