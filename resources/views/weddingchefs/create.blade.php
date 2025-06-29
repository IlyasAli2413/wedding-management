@extends('layouts.app')
@section('title', 'Add Chef')

@section('content')
<h2 style="margin-bottom: 20px;">Add New Wedding Chef</h2>

<form action="{{ route('weddingchefs.store') }}" method="POST" style="max-width: 600px;">
    @csrf
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Staff Member</label>
        <select name="Staffmember_ID" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            <option value="">-- Select Staff Member --</option>
            @foreach ($staffmembers as $staff)
                <option value="{{ $staff->Staffmember_ID }}">{{ $staff->Name }}</option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Speciality</label>
        <input type="text" name="Speciality" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <button type="submit" style="padding: 8px 16px; background-color: green; color: white; border: none; border-radius: 5px; margin-right: 10px;">
        Save
    </button>
    <a href="{{ route('weddingchefs.index') }}" style="padding: 8px 16px; background-color: gray; color: white; border-radius: 5px; text-decoration: none;">
        Cancel
    </a>
</form>
@endsection
