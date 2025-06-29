@extends('layouts.app')
@section('title', 'Staff Assignment Details')

@section('content')
<h2>Assignment Details</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Wedding:</strong> {{ $assignment->wedding->Event_Type ?? $assignment->Wedding_ID }}</li>
    <li class="list-group-item"><strong>Staff Member:</strong> {{ $assignment->staffMember->Name ?? $assignment->Staffmember_ID }}</li>
    <li class="list-group-item"><strong>Role:</strong> {{ $assignment->Role }}</li>
    <li class="list-group-item"><strong>Shift:</strong> {{ $assignment->Shift_Time }}</li>
</ul>

<a href="{{ route('wedding_staff_assignments.index') }}" class="btn btn-secondary">Back</a>
@endsection
