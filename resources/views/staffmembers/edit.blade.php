@extends('layouts.app')
@section('title', 'Edit Staff Member')

@section('content')
<h2 style="margin-bottom: 20px;">Edit Staff Member</h2>

<form action="{{ route('admin.staffmembers.update', $staffmember->Staffmember_ID) }}" method="POST">
    @csrf
    @method('PUT')
    <div style="margin-bottom: 15px;">
        <label>Name</label>
        <input type="text" name="Name" value="{{ $staffmember->Name }}" style="width: 100%; padding: 8px;" required>
    </div>
    <div style="margin-bottom: 15px;">
        <label>Address</label>
        <textarea name="Address" style="width: 100%; padding: 8px;" required>{{ $staffmember->Address }}</textarea>
    </div>
    <div style="margin-bottom: 15px;">
        <label>Salary</label>
        <input type="number" name="Salary" value="{{ $staffmember->Salary }}" style="width: 100%; padding: 8px;" required>
    </div>
    <button type="submit" style="background-color: blue; color: white; padding: 8px 15px;">Update</button>
    <a href="{{ route('admin.staffmembers.index') }}" style="background-color: gray; color: white; padding: 8px 15px; text-decoration: none;">Cancel</a>
</form>
@endsection
