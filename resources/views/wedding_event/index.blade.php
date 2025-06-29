@extends('layouts.app')
@section('title', 'Wedding Event Menus')

@section('content')
<h2>Wedding Event Menus</h2>

<a href="{{ route('wedding_events.create') }}" class="btn btn-primary mb-3">Assign Menu Item to Order</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Menu Item</th>
            <th>Quantity</th>
            <th>Special Notes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($weddingEvents as $event)
        <tr>
            <td>{{ $event->Order_ID }}</td>
            <td>{{ $event->menuItem->Name ?? 'N/A' }}</td>
            <td>{{ $event->Quantity }}</td>
            <td>{{ $event->Special_Notes }}</td>
            <td>
                <a href="{{ route('wedding_events.show', [$event->Order_ID, $event->MenuItem_ID]) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('wedding_events.edit', [$event->Order_ID, $event->MenuItem_ID]) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('wedding_events.destroy', [$event->Order_ID, $event->MenuItem_ID]) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this entry?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5">No records found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
