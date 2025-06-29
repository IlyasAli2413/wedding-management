@extends('layouts.app')
@section('title', 'Planner Details')

@section('content')
<h2 style="margin-bottom: 20px;">Planner Details</h2>

<ul style="list-style: none; padding: 0; max-width: 600px;">
    <li style="margin-bottom: 10px;"><strong>Name:</strong> {{ $planner->staffMember->Name ?? 'N/A' }}</li>
    <li style="margin-bottom: 10px;"><strong>Managed Events:</strong> {{ $planner->Managed_Events_Count }}</li>
</ul>

<a href="{{ route('weddingplanners.index') }}" style="padding: 8px 16px; background-color: gray; color: white; text-decoration: none;">Back</a>
@endsection
