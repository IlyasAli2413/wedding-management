@extends('layouts.app')
@section('title', 'Server Details')

@section('content')
<h2 style="margin-bottom: 20px;">Server Details</h2>

<ul style="list-style: none; padding: 0; max-width: 600px;">
    <li style="margin-bottom: 10px;"><strong>Name:</strong> {{ $server->staffMember->Name ?? 'N/A' }}</li>
    <li style="margin-bottom: 10px;"><strong>Assigned Section:</strong> {{ $server->Assigned_Section }}</li>
</ul>

<a href="{{ route('weddingservers.index') }}" style="padding: 8px 16px; background-color: gray; color: white; text-decoration: none;">Back</a>
@endsection
