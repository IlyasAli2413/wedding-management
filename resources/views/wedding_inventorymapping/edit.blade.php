@extends('layouts.app')
@section('title', 'Edit Mapping')

@section('content')
<h2>Edit Menu-Inventory Mapping</h2>

<form action="{{ route('menu_inventorymappings.update', $mapping->Menu_inventorymapping_ID) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Menu Item</label>
        <select name="MenuItem_ID" class="form-control" required>
            @foreach ($menuItems as $menu)
                <option value="{{ $menu->MenuItem_ID }}" {{ $menu->MenuItem_ID == $mapping->MenuItem_ID ? 'selected' : '' }}>
                    {{ $menu->Name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Inventory Item</label>
        <select name="Inventory_ID" class="form-control" required>
            @foreach ($inventoryItems as $inv)
                <option value="{{ $inv->Inventory_ID }}" {{ $inv->Inventory_ID == $mapping->Inventory_ID ? 'selected' : '' }}>
                    {{ $inv->Name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Quantity Required</label>
        <input type="number" name="Quantity_Required" class="form-control" value="{{ $mapping->Quantity_Required }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('menu_inventorymappings.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
