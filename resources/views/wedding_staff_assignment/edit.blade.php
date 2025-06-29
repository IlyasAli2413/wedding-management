@extends('layouts.app')
@section('title', 'Edit Assignment')

@section('content')
<h2>Edit Staff Assignment</h2>

<form action="{{ route('wedding_staff_assignments.update', [$assignment->Wedding_ID, $assignment->Staffmember_ID]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Role</label>
        <input type="text" name="Role" class="form-control" value="{{ $assignment->Role }}" required>
    </div>

    <div class="mb-3">
        <label>Shift Time</label>
        <input type="text" name="Shift_Time" class="form-control" value="{{ $assignment->Shift_Time }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('wedding_staff_assignments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
