@extends('layouts.app')
@section('title', 'Mapping Details')

@section('content')
<h2>Menu-Inventory Mapping Details</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Menu Item:</strong> {{ $mapping->menuItem->Name ?? 'N/A' }}</li>
    <li class="list-group-item"><strong>Inventory Item:</strong> {{ $mapping->inventoryItem->Name ?? 'N/A' }}</li>
    <li class="list-group-item"><strong>Quantity Required:</strong> {{ $mapping->Quantity_Required }}</li>
</ul>

<a href="{{ route('menu_inventorymappings.index') }}" class="btn btn-secondary">Back</a>
@endsection
