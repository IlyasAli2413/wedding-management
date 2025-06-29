@extends('layouts.app')
@section('title', 'Client Details')

@section('content')
<h2>Client Details</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Name:</strong> {{ $client->Name }}</li>
    <li class="list-group-item"><strong>Contact:</strong> {{ $client->Contact }}</li>
    <li class="list-group-item"><strong>Address:</strong> {{ $client->Address }}</li>
</ul>

<a href="{{ route('clients.index') }}" class="btn btn-secondary">Back</a>
@endsection
