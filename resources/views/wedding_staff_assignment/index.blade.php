@extends('layouts.app')
@section('title', 'Wedding Staff Assignments')

@section('content')
<h2>Wedding Staff Assignments</h2>

<a href="{{ route('wedding_staff_assignments.create') }}" class="btn btn-primary mb-3">Assign Staff to Wedding</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Wedding</th>
            <th>Staff Member</th>
            <th>Role</th>
            <th>Shift</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($assignments as $assignment)
        <tr>
            <td>{{ $assignment->wedding->Event_Type ?? $assignment->Wedding_ID }}</td>
            <td>{{ $assignment->staffMember->Name ?? $assignment->Staffmember_ID }}</td>
            <td>{{ $assignment->Role }}</td>
            <td>{{ $assignment->Shift_Time }}</td>
            <td>
                <a href="{{ route('wedding_staff_assignments.show', [$assignment->Wedding_ID, $assignment->Staffmember_ID]) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('wedding_staff_assignments.edit', [$assignment->Wedding_ID, $assignment->Staffmember_ID]) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('wedding_staff_assignments.destroy', [$assignment->Wedding_ID, $assignment->Staffmember_ID]) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this assignment?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5">No assignments found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
