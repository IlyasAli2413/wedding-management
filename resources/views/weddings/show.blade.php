@extends('layouts.app')
@section('title', 'Wedding Details')

@section('content')
<h2>Wedding Details</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Event Type:</strong> {{ $wedding->Event_Type }}</li>
    <li class="list-group-item"><strong>Date:</strong> {{ $wedding->Date }}</li>
    <li class="list-group-item"><strong>Client Contact:</strong> {{ $wedding->Client_Contact }}</li>
    <li class="list-group-item"><strong>Venue:</strong> {{ $wedding->venue->Name ?? 'N/A' }}</li>
</ul>

<a href="{{ route('weddings.index') }}" class="btn btn-secondary">Back</a>
@endsection
