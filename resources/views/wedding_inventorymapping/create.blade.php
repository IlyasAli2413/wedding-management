@extends('layouts.app')
@section('title', 'Add Menu-Inventory Mapping')

@section('content')
<h2>Add Menu-Inventory Mapping</h2>

<form action="{{ route('menu_inventorymappings.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Menu Item</label>
        <select name="MenuItem_ID" class="form-control" required>
            <option value="">-- Select Menu Item --</option>
            @foreach ($menuItems as $menu)
                <option value="{{ $menu->MenuItem_ID }}">{{ $menu->Name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Inventory Item</label>
        <select name="Inventory_ID" class="form-control" required>
            <option value="">-- Select Inventory Item --</option>
            @foreach ($inventoryItems as $inv)
                <option value="{{ $inv->Inventory_ID }}">{{ $inv->Name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Quantity Required</label>
        <input type="number" name="Quantity_Required" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('menu_inventorymappings.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
