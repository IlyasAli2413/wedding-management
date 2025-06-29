@extends('layouts.app')
@section('title', 'Staff Member Details')

@section('content')
<h2 style="margin-bottom: 20px;">Staff Member Details</h2>

<ul style="list-style: none; padding: 0;">
    <li style="margin-bottom: 10px;"><strong>ID:</strong> {{ $staffmember->Staffmember_ID }}</li>
    <li style="margin-bottom: 10px;"><strong>Name:</strong> {{ $staffmember->Name }}</li>
    <li style="margin-bottom: 10px;"><strong>Address:</strong> {{ $staffmember->Address }}</li>
    <li style="margin-bottom: 10px;"><strong>Salary:</strong> {{ $staffmember->Salary }}</li>
</ul>

<a href="{{ route('staffmembers.index') }}" style="background-color: gray; color: white; padding: 8px 15px; text-decoration: none;">Back</a>
@endsection
