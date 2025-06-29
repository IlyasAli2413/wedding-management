@extends('layouts.app')
@section('title', 'Guest Details')

@section('content')
<h2>Guest Details</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Name:</strong> {{ $guest->Name }}</li>
    <li class="list-group-item"><strong>Contact:</strong> {{ $guest->Contact }}</li>
    <li class="list-group-item"><strong>Address:</strong> {{ $guest->Address }}</li>
    <li class="list-group-item"><strong>Wedding:</strong> {{ $guest->wedding->Event_Type ?? 'N/A' }} ({{ $guest->wedding->Date ?? '' }})</li>
</ul>

<a href="{{ route('guests.index') }}" class="btn btn-secondary">Back</a>
@endsection
