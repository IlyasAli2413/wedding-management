@extends('layouts.app')

@section('content')
<h2>Venue Details</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Name:</strong> {{ $venue->name }}</li>
    <li class="list-group-item"><strong>Location:</strong> {{ $venue->location }}</li>
    <li class="list-group-item"><strong>Capacity:</strong> {{ $venue->capacity }}</li>
</ul>

<a href="{{ route('venues.index') }}" class="btn btn-secondary">Back</a>
@endsection
