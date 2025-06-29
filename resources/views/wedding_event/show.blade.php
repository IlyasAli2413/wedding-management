@extends('layouts.app')
@section('title', 'Wedding Event Details')

@section('content')
<h2>Wedding Event Menu Assignment</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Order:</strong> {{ $event->Order_ID }}</li>
    <li class="list-group-item"><strong>Menu Item:</strong> {{ $event->menuItem->Name ?? 'N/A' }}</li>
    <li class="list-group-item"><strong>Quantity:</strong> {{ $event->Quantity }}</li>
    <li class="list-group-item"><strong>Special Notes:</strong> {{ $event->Special_Notes }}</li>
</ul>

<a href="{{ route('wedding_events.index') }}" class="btn btn-secondary">Back</a>
@endsection
