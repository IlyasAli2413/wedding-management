@extends('layouts.app')
@section('title', 'Inventory Item Details')

@section('content')
<h2 style="margin-bottom: 20px;">Inventory Item Details</h2>

<ul style="list-style: none; padding: 0; margin-bottom: 20px;">
    <li style="padding: 10px; border: 1px solid #ccc; margin-bottom: 5px; background-color: #f9f9f9;">
        <strong>Name:</strong> {{ $inventoryItem->Name }}
    </li>
    <li style="padding: 10px; border: 1px solid #ccc; margin-bottom: 5px; background-color: #f9f9f9;">
        <strong>Unit:</strong> {{ $inventoryItem->Unit }}
    </li>
    <li style="padding: 10px; border: 1px solid #ccc; margin-bottom: 5px; background-color: #f9f9f9;">
        <strong>Availability:</strong>
        <span style="padding: 5px 10px; color: #fff; border-radius: 4px; background-color: {{ $inventoryItem->Availability ? '#28a745' : '#dc3545' }};">
            {{ $inventoryItem->Availability ? 'Yes' : 'No' }}
        </span>
    </li>
</ul>

<a href="{{ route('inventory_items.index') }}" style="display: inline-block; background-color: #6c757d; color: #fff; padding: 8px 16px; text-decoration: none; border-radius: 4px;">Back</a>
@endsection
