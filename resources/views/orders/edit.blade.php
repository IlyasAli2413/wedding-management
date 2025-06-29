@extends('layouts.app')
@section('title', 'Edit Order')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #2c3e50;
    }

    form {
        max-width: 800px;
        margin: 0 auto;
        padding: 25px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .form-section {
        background: #f8f9fa;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        border-left: 4px solid #007bff;
    }

    .form-section h3 {
        margin-top: 0;
        color: #2c3e50;
        font-size: 18px;
    }

    .mb-3 {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        color: #34495e;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    select,
    textarea {
        width: 100%;
        padding: 10px 12px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: #fcfcfc;
        transition: border-color 0.3s ease;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #007bff;
        outline: none;
    }

    .radio-group {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .radio-option input[type="radio"] {
        width: auto;
    }

    .venue-section {
        display: none;
        padding: 15px;
        background: #e9ecef;
        border-radius: 6px;
        margin-top: 10px;
    }

    .venue-section.active {
        display: block;
    }

    .btn {
        padding: 10px 18px;
        border-radius: 5px;
        font-size: 15px;
        text-decoration: none;
        margin-right: 10px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .alert {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .text-danger {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }

    .menu-item {
        background: #f8f9fa;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 6px;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
    }

    .menu-item:hover {
        border-color: #007bff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .menu-item-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .menu-item-details {
        background: #e9ecef;
        padding: 15px;
        border-radius: 6px;
        margin-top: 10px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 0 10px;
    }

    .form-control {
        width: 100%;
        padding: 8px 12px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
    }

    .text-muted {
        color: #6c757d;
        font-size: 14px;
    }

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }
</style>

<h2>Edit Order</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Auth::user()->isAdmin())
    <form action="{{ route('admin.orders.update', $order->Order_ID) }}" method="POST">
@else
    <form action="{{ route('user.orders.update', $order->Order_ID) }}" method="POST">
@endif
    @csrf
    @method('PUT')

    <!-- Client Information -->
    <div class="form-section">
        <h3>👤 Client Information</h3>
        <div class="mb-3">
            <label for="client_name">Client Name</label>
            <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $order->client->Name ?? '') }}" placeholder="Enter your full name" required>
            @error('client_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Client_Contact">Contact Information</label>
            <input type="text" name="Client_Contact" id="Client_Contact" value="{{ old('Client_Contact', $order->wedding->Client_Contact ?? '') }}" placeholder="Phone number or email address" required>
            @error('Client_Contact')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Venue Selection -->
    <div class="form-section">
        <h3>🏛️ Venue Selection</h3>
        <div class="radio-group">
            <div class="radio-option">
                <input type="radio" id="venue_existing" name="venue_type" value="existing" checked>
                <label for="venue_existing">Select from existing venues</label>
            </div>
            <div class="radio-option">
                <input type="radio" id="venue_manual" name="venue_type" value="manual">
                <label for="venue_manual">Enter venue manually</label>
            </div>
        </div>

        <!-- Existing Venues Section -->
        <div id="existing_venue_section" class="venue-section active">
            <div class="mb-3">
                <label for="Venue_ID">Select Venue</label>
                <select name="Venue_ID" id="Venue_ID">
                    <option value="">Choose a venue</option>
                    @foreach($venues as $venue)
                        <option value="{{ $venue->Venue_ID }}" {{ old('Venue_ID', $order->wedding->Venue_ID ?? '') == $venue->Venue_ID ? 'selected' : '' }}>
                            {{ $venue->Name }} - {{ $venue->Location }} (Capacity: {{ $venue->Capacity }})
                        </option>
                    @endforeach
                </select>
                @error('Venue_ID')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Manual Venue Section -->
        <div id="manual_venue_section" class="venue-section">
            <div class="mb-3">
                <label for="manual_venue_name">Venue Name</label>
                <input type="text" name="manual_venue_name" id="manual_venue_name" value="{{ old('manual_venue_name') }}" placeholder="Enter venue name">
                @error('manual_venue_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="manual_venue_location">Venue Location</label>
                <input type="text" name="manual_venue_location" id="manual_venue_location" value="{{ old('manual_venue_location') }}" placeholder="Enter venue address">
                @error('manual_venue_location')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="manual_venue_capacity">Venue Capacity</label>
                <input type="number" name="manual_venue_capacity" id="manual_venue_capacity" value="{{ old('manual_venue_capacity') }}" placeholder="Enter venue capacity" min="1">
                @error('manual_venue_capacity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Event Details -->
    <div class="form-section">
        <h3>🎉 Event Details</h3>
        <div class="mb-3">
            <label for="Event_Type">Event Type</label>
            <select name="Event_Type" id="Event_Type" required>
                <option value="">Select Event Type</option>
                <option value="Traditional Wedding" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Traditional Wedding' ? 'selected' : '' }}>Traditional Wedding</option>
                <option value="Destination Wedding" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Destination Wedding' ? 'selected' : '' }}>Destination Wedding</option>
                <option value="Beach Wedding" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Beach Wedding' ? 'selected' : '' }}>Beach Wedding</option>
                <option value="Religious Wedding" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Religious Wedding' ? 'selected' : '' }}>Religious Wedding</option>
                <option value="Civil Wedding" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Civil Wedding' ? 'selected' : '' }}>Civil Wedding</option>
                <option value="Garden Wedding" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Garden Wedding' ? 'selected' : '' }}>Garden Wedding</option>
                <option value="Rustic Wedding" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Rustic Wedding' ? 'selected' : '' }}>Rustic Wedding</option>
                <option value="Modern Wedding" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Modern Wedding' ? 'selected' : '' }}>Modern Wedding</option>
                <option value="Intimate Wedding" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Intimate Wedding' ? 'selected' : '' }}>Intimate Wedding</option>
                <option value="Luxury Wedding" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Luxury Wedding' ? 'selected' : '' }}>Luxury Wedding</option>
                <option value="Other" {{ old('Event_Type', $order->wedding->Event_Type ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('Event_Type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Wedding_Date">Wedding Date</label>
            <input type="date" name="Wedding_Date" id="Wedding_Date" value="{{ old('Wedding_Date', $order->wedding->Date ?? '') }}" required>
            @error('Wedding_Date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Order Details -->
    <div class="form-section">
        <h3>📋 Order Details</h3>
        <div class="mb-3">
            <label for="Order_Date">Order Date</label>
            <input type="date" name="Order_Date" id="Order_Date" value="{{ old('Order_Date', $order->Order_Date) }}" required>
            @error('Order_Date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Status">Order Status</label>
            <select name="Status" id="Status" required>
                <option value="Pending" {{ old('Status', $order->Status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Confirmed" {{ old('Status', $order->Status) == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="In Progress" {{ old('Status', $order->Status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ old('Status', $order->Status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ old('Status', $order->Status) == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @error('Status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Menu Items Selection -->
    <div class="form-section">
        <h3>🍽️ Menu Items Selection</h3>
        <p class="text-muted mb-3">Select the menu items you'd like for your wedding. You can choose multiple items and specify quantities.</p>
        
        <div id="menu-items-container">
            @if($menuItems->count() > 0)
                @foreach($menuItems as $menuItem)
                    @php
                        $isSelected = $order->menuItems->contains('MenuItem_ID', $menuItem->MenuItem_ID);
                        $selectedItem = $order->menuItems->where('MenuItem_ID', $menuItem->MenuItem_ID)->first();
                        $quantity = $isSelected ? $selectedItem->pivot->Quantity : 1;
                        $notes = $isSelected ? $selectedItem->pivot->Special_Notes : '';
                    @endphp
                    <div class="menu-item">
                        <div class="menu-item-header">
                            <div>
                                <strong>{{ $menuItem->Name }}</strong>
                                <span class="text-muted"> - ${{ number_format($menuItem->Price, 2) }}</span>
                            </div>
                            <div>
                                <input type="checkbox" 
                                       name="menu_items[{{ $menuItem->MenuItem_ID }}][selected]" 
                                       id="menu_{{ $menuItem->MenuItem_ID }}" 
                                       class="menu-checkbox"
                                       data-menu-id="{{ $menuItem->MenuItem_ID }}"
                                       {{ $isSelected ? 'checked' : '' }}>
                                <label for="menu_{{ $menuItem->MenuItem_ID }}">Select</label>
                            </div>
                        </div>
                        <p class="text-muted">{{ $menuItem->Details }}</p>
                        <div class="menu-item-details" id="details_{{ $menuItem->MenuItem_ID }}" style="display: {{ $isSelected ? 'block' : 'none' }};">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="quantity_{{ $menuItem->MenuItem_ID }}">Quantity:</label>
                                    <input type="number" 
                                           name="menu_items[{{ $menuItem->MenuItem_ID }}][Quantity]" 
                                           id="quantity_{{ $menuItem->MenuItem_ID }}" 
                                           min="1" 
                                           value="{{ $quantity }}" 
                                           class="form-control"
                                           {{ $isSelected ? 'required' : '' }}>
                                    <input type="hidden" 
                                           name="menu_items[{{ $menuItem->MenuItem_ID }}][MenuItem_ID]" 
                                           value="{{ $menuItem->MenuItem_ID }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="notes_{{ $menuItem->MenuItem_ID }}">Special Notes:</label>
                                    <textarea name="menu_items[{{ $menuItem->MenuItem_ID }}][Special_Notes]" 
                                              id="notes_{{ $menuItem->MenuItem_ID }}" 
                                              class="form-control" 
                                              placeholder="Any special requests or dietary requirements">{{ $notes }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">
                    <p>No menu items are currently available. Please contact the administrator to add menu items.</p>
                </div>
            @endif
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update Order</button>
    @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Cancel</a>
    @else
        <a href="{{ route('user.orders.index') }}" class="btn btn-secondary">Cancel</a>
    @endif
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const venueExisting = document.getElementById('venue_existing');
    const venueManual = document.getElementById('venue_manual');
    const existingSection = document.getElementById('existing_venue_section');
    const manualSection = document.getElementById('manual_venue_section');

    function toggleVenueSections() {
        if (venueExisting.checked) {
            existingSection.classList.add('active');
            manualSection.classList.remove('active');
            // Make existing venue required, manual fields not required
            document.getElementById('Venue_ID').required = true;
            document.getElementById('manual_venue_name').required = false;
            document.getElementById('manual_venue_location').required = false;
            document.getElementById('manual_venue_capacity').required = false;
        } else {
            existingSection.classList.remove('active');
            manualSection.classList.add('active');
            // Make manual fields required, existing venue not required
            document.getElementById('Venue_ID').required = false;
            document.getElementById('manual_venue_name').required = true;
            document.getElementById('manual_venue_location').required = true;
            document.getElementById('manual_venue_capacity').required = true;
        }
    }

    venueExisting.addEventListener('change', toggleVenueSections);
    venueManual.addEventListener('change', toggleVenueSections);
});
</script>

@endsection
