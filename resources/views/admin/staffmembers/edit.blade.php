@extends('layouts.app')
@section('title', 'Edit Staff Member')

@section('content')
<h2 style="margin-bottom: 20px;">Edit Staff Member</h2>

<form action="{{ route('admin.staffmembers.update', $staffmember->Staffmember_ID) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="margin-bottom: 10px;">
        <label>Name:</label>
        <input type="text" name="Name" value="{{ $staffmember->Name }}" style="width: 100%; padding: 8px;" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label>Address:</label>
        <input type="text" name="Address" value="{{ $staffmember->Address }}" style="width: 100%; padding: 8px;" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label>Salary:</label>
        <input type="number" name="Salary" value="{{ $staffmember->Salary }}" style="width: 100%; padding: 8px;" required>
    </div>
    <button type="submit" style="background-color: #ffc107; color: black; padding: 10px 15px; border: none;">Update</button>
    <a href="{{ route('admin.staffmembers.index') }}" style="padding: 10px 15px; background: #ccc; text-decoration: none;">Cancel</a>
</form>
@endsection
