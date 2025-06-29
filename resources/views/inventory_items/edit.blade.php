@extends('layouts.app')
@section('title', 'Edit Inventory Item')

@section('content')
<h2 style="margin-bottom: 20px;">Edit Inventory Item</h2>

<form action="{{ route('inventory_items.update', $inventoryItem->Inventory_ID) }}" method="POST" style="max-width: 600px; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 15px;">
        <label style="font-weight: bold; display: block; margin-bottom: 5px;">Name</label>
        <input type="text" name="Name" value="{{ $inventoryItem->Name }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="font-weight: bold; display: block; margin-bottom: 5px;">Unit</label>
        <input type="text" name="Unit" value="{{ $inventoryItem->Unit }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label style="font-weight: bold; display: block; margin-bottom: 5px;">Availability</label>
        <select name="Availability" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="1" {{ $inventoryItem->Availability ? 'selected' : '' }}>Available</option>
            <option value="0" {{ !$inventoryItem->Availability ? 'selected' : '' }}>Not Available</option>
        </select>
    </div>

    <div style="margin-top: 20px;">
        <button type="submit" style="background-color: #007bff; color: white; padding: 8px 16px; border: none; border-radius: 4px;">Update</button>
        <a href="{{ route('inventory_items.index') }}" style="background-color: gray; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; margin-left: 10px;">Cancel</a>
    </div>
</form>
@endsection
