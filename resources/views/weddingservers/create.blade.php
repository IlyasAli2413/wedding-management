@extends('layouts.app')
@section('title', 'Add Server')

@section('content')
<h2 style="margin-bottom: 20px;">Add New Wedding Server</h2>

<form action="{{ route('weddingservers.store') }}" method="POST" style="max-width: 600px;">
    @csrf
    <div style="margin-bottom: 15px;">
        <label style="display: block;">Staff Member</label>
        <select name="Staffmember_ID" required style="width: 100%; padding: 8px;">
            <option value="">-- Select Staff Member --</option>
            @foreach ($staffmembers as $staff)
                <option value="{{ $staff->Staffmember_ID }}">{{ $staff->Name }}</option>
            @endforeach
        </select>
    </div>
    <div style="margin-bottom: 15px;">
        <label style="display: block;">Assigned Section</label>
        <input type="text" name="Assigned_Section" required style="width: 100%; padding: 8px;">
    </div>
    <button type="submit" style="padding: 8px 16px; background-color: green; color: white; border: none;">Save</button>
    <a href="{{ route('weddingservers.index') }}" style="padding: 8px 16px; background-color: gray; color: white; text-decoration: none; margin-left: 10px;">Cancel</a>
</form>
@endsection
