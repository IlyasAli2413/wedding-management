@extends('layouts.app')
@section('title', 'Add Inventory Item')

@section('content')
<h2 style="margin-bottom: 20px;">Add New Inventory Item</h2>

<form action="{{ route('inventory_items.store') }}" method="POST" style="max-width: 600px; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
    @csrf
    <div style="margin-bottom: 15px;">
        <label style="font-weight: bold; display: block; margin-bottom: 5px;">Name</label>
        <input type="text" name="Name" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
    </div>
    <div style="margin-bottom: 15px;">
        <label style="font-weight: bold; display: block; margin-bottom: 5px;">Unit (e.g., kg, liter, pcs)</label>
        <input type="text" name="Unit" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
    </div>
    <div style="margin-bottom: 15px;">
        <label style="font-weight: bold; display: block; margin-bottom: 5px;">Availability</label>
        <select name="Availability" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
            <option value="1">Available</option>
            <option value="0">Not Available</option>
        </select>
    </div>
    <div style="margin-top: 20px;">
        <button type="submit" style="background-color: green; color: white; padding: 8px 16px; border: none; border-radius: 4px;">Save</button>
        <a href="{{ route('inventory_items.index') }}" style="background-color: gray; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; margin-left: 10px;">Cancel</a>
    </div>
</form>
@endsection
