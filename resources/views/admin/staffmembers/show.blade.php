@extends('layouts.app')
@section('title', 'View Staff Member')

@section('content')
<h2 style="margin-bottom: 20px;">Staff Member Details</h2>

<div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 20px;">
    <p><strong>ID:</strong> {{ $staffmember->Staffmember_ID }}</p>
    <p><strong>Name:</strong> {{ $staffmember->Name }}</p>
    <p><strong>Address:</strong> {{ $staffmember->Address }}</p>
    <p><strong>Salary:</strong> {{ $staffmember->Salary }}</p>
</div>

<a href="{{ route('admin.staffmembers.index') }}" style="padding: 10px 15px; background: #0d6efd; color: white; text-decoration: none;">Back to List</a>
@endsection
