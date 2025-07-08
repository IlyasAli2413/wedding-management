@extends('layouts.app')
@section('title', 'Add Staff Member')

@section('content')
<h2 style="margin-bottom: 20px;">Add Staff Member</h2>

<form action="{{ route('admin.staffmembers.store') }}" method="POST">
    @csrf
    <div style="margin-bottom: 10px;">
        <label>Name:</label>
        <input type="text" name="Name" value="{{ old('Name') }}" style="width: 100%; padding: 8px;" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label>Address:</label>
        <input type="text" name="Address" value="{{ old('Address') }}" style="width: 100%; padding: 8px;" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label>Salary:</label>
        <input type="number" name="Salary" value="{{ old('Salary') }}" style="width: 100%; padding: 8px;" required>
    </div>
    <button type="submit" style="background-color: green; color: white; padding: 10px 15px; border: none;">Save</button>
    <a href="{{ route('admin.staffmembers.index') }}" style="padding: 10px 15px; background: #ccc; text-decoration: none;">Cancel</a>
</form>
@endsection
