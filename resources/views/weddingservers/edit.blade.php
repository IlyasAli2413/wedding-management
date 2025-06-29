@extends('layouts.app')
@section('title', 'Edit Server')

@section('content')
<h2 style="margin-bottom: 20px;">Edit Server</h2>

<form action="{{ route('weddingservers.update', $server->Staffmember_ID) }}" method="POST" style="max-width: 600px;">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 15px;">
        <label style="display: block;">Assigned Section</label>
        <input type="text" name="Assigned_Section" value="{{ $server->Assigned_Section }}" required style="width: 100%; padding: 8px;">
    </div>

    <button type="submit" style="padding: 8px 16px; background-color: blue; color: white; border: none;">Update</button>
    <a href="{{ route('weddingservers.index') }}" style="padding: 8px 16px; background-color: gray; color: white; text-decoration: none; margin-left: 10px;">Cancel</a>
</form>
@endsection
