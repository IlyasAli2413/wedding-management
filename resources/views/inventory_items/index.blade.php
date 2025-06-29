@extends('layouts.app')
@section('title', 'Inventory Items')

@section('content')
<h2 style="margin-bottom: 20px;">Inventory Items</h2>

<a href="{{ route('inventory_items.create') }}" style="display: inline-block; background-color: #007bff; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; margin-bottom: 20px;">Add New Item</a>

<table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
    <thead>
        <tr style="background-color: #f1f1f1;">
            <th style="border: 1px solid #ddd; padding: 10px;">ID</th>
            <th style="border: 1px solid #ddd; padding: 10px;">Name</th>
            <th style="border: 1px solid #ddd; padding: 10px;">Unit</th>
            <th style="border: 1px solid #ddd; padding: 10px;">Available?</th>
            <th style="border: 1px solid #ddd; padding: 10px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($inventoryItems as $item)
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->Inventory_ID }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->Name }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->Unit }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">
                <span style="padding: 4px 10px; border-radius: 4px; color: white; background-color: {{ $item->Availability ? '#28a745' : '#dc3545' }};">
                    {{ $item->Availability ? 'Yes' : 'No' }}
                </span>
            </td>
            <td style="border: 1px solid #ddd; padding: 8px;">
                <a href="{{ route('inventory_items.show', $item->Inventory_ID) }}" style="background-color: #17a2b8; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px; font-size: 14px;">View</a>
                <a href="{{ route('inventory_items.edit', $item->Inventory_ID) }}" style="background-color: #ffc107; color: black; padding: 6px 10px; text-decoration: none; border-radius: 4px; font-size: 14px;">Edit</a>
                <form action="{{ route('inventory_items.destroy', $item->Inventory_ID) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this item?')" style="background-color: #dc3545; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 14px;">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align: center; padding: 10px; border: 1px solid #ddd;">No inventory items found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
