@extends('layouts.app')
@section('title', 'Wedding Venue Mappings')

@section('content')
<h2 style="margin-bottom: 20px; font-weight: bold;">Wedding Venue Mappings</h2>

<a href="{{ route('wedding_venue_mappings.create') }}" style="margin-bottom: 15px; display: inline-block; padding: 8px 16px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Add New Mapping</a>

<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr style="background-color: #f8f9fa;">
            <th style="border: 1px solid #dee2e6; padding: 8px;">Wedding</th>
            <th style="border: 1px solid #dee2e6; padding: 8px;">Venue</th>
            <th style="border: 1px solid #dee2e6; padding: 8px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mappings as $mapping)
        <tr>
            <td style="border: 1px solid #dee2e6; padding: 8px;">{{ $mapping->wedding->Event_Type ?? 'N/A' }}</td>
            <td style="border: 1px solid #dee2e6; padding: 8px;">{{ $mapping->venue->Name ?? 'N/A' }}</td>
            <td style="border: 1px solid #dee2e6; padding: 8px;">
                <a href="{{ route('wedding_venue_mappings.show', [$mapping->wedding_id, $mapping->venue_id]) }}" style="padding: 6px 10px; background-color: #17a2b8; color: white; border-radius: 3px; text-decoration: none;">View</a>
                <a href="{{ route('wedding_venue_mappings.edit', [$mapping->wedding_id, $mapping->venue_id]) }}" style="padding: 6px 10px; background-color: #ffc107; color: white; border-radius: 3px; text-decoration: none;">Edit</a>
                <form action="{{ route('wedding_venue_mappings.destroy', [$mapping->wedding_id, $mapping->venue_id]) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this mapping?')" style="padding: 6px 10px; background-color: #dc3545; color: white; border: none; border-radius: 3px;">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
