@extends('layouts.app')
@section('title', 'Mapping Details')

@section('content')
<h2 style="margin-bottom: 20px;">Mapping Details</h2>

<ul style="list-style: none; padding-left: 0; max-width: 500px;">
    <li style="padding: 10px; border: 1px solid #dee2e6; margin-bottom: 10px;"><strong>Wedding:</strong> {{ $mapping->wedding->Event_Type ?? 'N/A' }} - {{ $mapping->wedding->Date ?? '' }}</li>
    <li style="padding: 10px; border: 1px solid #dee2e6;"><strong>Venue:</strong> {{ $mapping->venue->Name ?? 'N/A' }}</li>
</ul>

<a href="{{ route('wedding_venue_mappings.index') }}" style="padding: 10px 16px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Back</a>
@endsection
