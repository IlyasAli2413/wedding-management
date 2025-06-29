@extends('layouts.app')
@section('title', 'Add Staff Member')

@section('content')
<h2 style="margin-bottom: 20px;">Add New Staff Member</h2>

<form action="{{ route('staffmembers.store') }}" method="POST">
    @csrf
    <div style="margin-bottom: 15px;">
        <label>Name</label>
        <input type="text" name="Name" style="width: 100%; padding: 8px;" required>
    </div>
    <div style="margin-bottom: 15px;">
        <label>Address</label>
        <textarea name="Address" style="width: 100%; padding: 8px;" required></textarea>
    </div>
    <div style="margin-bottom: 15px;">
        <label>Salary</label>
        <input type="number" name="Salary" style="width: 100%; padding: 8px;" required>
    </div>
    <button type="submit" style="background-color: green; color: white; padding: 8px 15px;">Save</button>
    <a href="{{ route('staffmembers.index') }}" style="background-color: gray; color: white; padding: 8px 15px; text-decoration: none;">Cancel</a>
</form>
@endsection
