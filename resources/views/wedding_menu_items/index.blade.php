@extends('layouts.app')
@section('title', 'Menu Items')

@section('content')
<h2 style="margin-bottom: 20px;">{{ Auth::user()->isAdmin() ? 'Wedding Menu Items' : 'Available Menu Items' }}</h2>

@if(Auth::user()->isAdmin())
    <a href="{{ route('admin.weddingmenuitems.create') }}" style="display: inline-block; margin-bottom: 15px; padding: 8px 16px; background-color: green; color: white; text-decoration: none;">Add Menu Item</a>
@endif

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Details</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Price</th>
            @if(Auth::user()->isAdmin())
                <th style="border: 1px solid #ddd; padding: 8px;">Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($menuItems as $item)
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->MenuItem_ID }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->Name }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->Details }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->Price }}</td>
            @if(Auth::user()->isAdmin())
                <td style="border: 1px solid #ddd; padding: 8px;">
                    <a href="{{ route('admin.weddingmenuitems.show', $item->MenuItem_ID) }}" style="padding: 4px 8px; background-color: #17a2b8; color: white; text-decoration: none;">View</a>
                    <a href="{{ route('admin.weddingmenuitems.edit', $item->MenuItem_ID) }}" style="padding: 4px 8px; background-color: orange; color: white; text-decoration: none;">Edit</a>
                    <form action="{{ route('admin.weddingmenuitems.destroy', $item->MenuItem_ID) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button style="padding: 4px 8px; background-color: red; color: white; border: none;" onclick="return confirm('Delete this item?')">Delete</button>
                    </form>
                </td>
            @else
                <td style="border: 1px solid #ddd; padding: 8px;">
                    <a href="{{ route('user.menu-items.show', $item->MenuItem_ID) }}" style="padding: 4px 8px; background-color: #17a2b8; color: white; text-decoration: none;">View Details</a>
                </td>
            @endif
        </tr>
        @empty
        <tr><td colspan="{{ Auth::user()->isAdmin() ? '5' : '4' }}" style="text-align: center;">No menu items found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
