@extends('layouts.app')
@section('title', 'Edit Planner')

@section('content')
<h2 style="margin-bottom: 20px;">Edit Planner</h2>

<form action="{{ route('weddingplanners.update', $planner->Staffmember_ID) }}" method="POST" style="max-width: 600px;">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 15px;">
        <label style="display: block;">Managed Events Count</label>
        <input type="number" name="Managed_Events_Count" value="{{ $planner->Managed_Events_Count }}" required style="width: 100%; padding: 8px;">
    </div>

    <button type="submit" style="padding: 8px 16px; background-color: blue; color: white; border: none;">Update</button>
    <a href="{{ route('weddingplanners.index') }}" style="padding: 8px 16px; background-color: gray; color: white; text-decoration: none; margin-left: 10px;">Cancel</a>
</form>
@endsection
