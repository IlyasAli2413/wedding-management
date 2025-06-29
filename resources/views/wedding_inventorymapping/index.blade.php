@extends('layouts.app')
@section('title', 'Menu Inventory Mapping List')

@section('content')
<h2>Menu Inventory Mapping</h2>

<a href="{{ route('menu_inventorymappings.create') }}" class="btn btn-primary mb-3">Add Mapping</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Menu Item</th>
            <th>Inventory Item</th>
            <th>Quantity Required</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mappings as $map)
        <tr>
            <td>{{ $map->Menu_inventorymapping_ID }}</td>
            <td>{{ $map->menuItem->Name ?? 'N/A' }}</td>
            <td>{{ $map->inventoryItem->Name ?? 'N/A' }}</td>
            <td>{{ $map->Quantity_Required }}</td>
            <td>
                <a href="{{ route('menu_inventorymappings.show', $map->Menu_inventorymapping_ID) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('menu_inventorymappings.edit', $map->Menu_inventorymapping_ID) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('menu_inventorymappings.destroy', $map->Menu_inventorymapping_ID) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this mapping?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5">No mappings found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
