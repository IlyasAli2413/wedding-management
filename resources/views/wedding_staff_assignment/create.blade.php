@extends('layouts.app')
@section('title', 'Assign Staff to Wedding')

@section('content')
<h2>Assign Staff to Wedding</h2>

<form action="{{ route('wedding_staff_assignments.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Wedding</label>
        <select name="Wedding_ID" class="form-control" required>
            <option value="">-- Select Wedding --</option>
            @foreach ($weddings as $wedding)
                <option value="{{ $wedding->Wedding_ID }}">{{ $wedding->Event_Type }} - {{ $wedding->Date }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Staff Member</label>
        <select name="Staffmember_ID" class="form-control" required>
            <option value="">-- Select Staff --</option>
            @foreach ($staffMembers as $staff)
                <option value="{{ $staff->Staffmember_ID }}">{{ $staff->Name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Role</label>
        <input type="text" name="Role" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Shift Time</label>
        <input type="text" name="Shift_Time" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Assign</button>
    <a href="{{ route('wedding_staff_assignments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
