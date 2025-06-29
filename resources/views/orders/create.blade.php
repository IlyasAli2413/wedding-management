@extends('layouts.app')
@section('title', 'Create New Order')

@section('content')
<style>
    body {
        background-color: #f5f7fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 800px;
        margin: 30px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    .form-section {
        margin-bottom: 30px;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        background-color: #fafafa;
    }

    .form-section h3 {
        color: #2c3e50;
        margin-bottom: 15px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 5px;
    }

    .mb-3 {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
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
        border: 1px solid #ced4da;
        border-radius: 6px;
        background-color: #fdfdfd;
        transition: border-color 0.3s ease;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #3490dc;
        outline: none;
        box-shadow: 0 0 0 2px rgba(52, 144, 220, 0.2);
    }

    .menu-items-section {
        max-height: 300px;
        overflow-y: auto;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 6px;
        background-color: #fff;
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

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 6px;
    }

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }

    .btn {
        padding: 12px 24px;
        border-radius: 6px;
        font-size: 16px;
        text-decoration: none;
        margin-right: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
        transform: translateY(-1px);
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .text-danger {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }

    .row {
        display: flex;
        gap: 15px;
    }

    .col {
        flex: 1;
    }

    .venue-options {
        margin-bottom: 15px;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 6px;
        border: 1px solid #e9ecef;
    }

    .venue-options input[type="radio"] {
        margin-right: 8px;
        transform: scale(1.1);
    }

    .venue-options label {
        font-weight: normal;
        color: #495057;
        cursor: pointer;
    }

    #existing_venue_section,
    #manual_venue_section {
        margin-top: 10px;
    }

    #manual_venue_section input {
        margin-bottom: 10px;
    }

    .venue-section.active {
        display: block;
    }
</style>

<div class="container">
    <h2>🎉 Create New Wedding Order</h2>

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
        <form action="{{ route('admin.orders.store') }}" method="POST" id="orderForm">
    @else
        <form action="{{ route('user.orders.store') }}" method="POST" id="orderForm">
    @endif
        @csrf
        
        <!-- Client Information -->
        <div class="form-section">
            <h3>👤 Client Information</h3>
            <div class="mb-3">
                <label for="client_name">Client Name</label>
                <input type="text" name="client_name" id="client_name" value="{{ old('client_name') }}" placeholder="Enter your full name" required>
                @error('client_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Client_Contact">Contact Information</label>
                <input type="text" name="Client_Contact" id="Client_Contact" value="{{ old('Client_Contact') }}" placeholder="Phone number or email address" required>
                @error('Client_Contact')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Wedding Details -->
        <div class="form-section">
            <h3>💒 Wedding Details</h3>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="venue_selection">Venue Selection</label>
                        <div class="venue-options">
                            <div class="mb-2">
                                <input type="radio" name="venue_type" id="venue_existing" value="existing" checked>
                                <label for="venue_existing" style="display: inline; margin-left: 5px;">Select from existing venues</label>
                            </div>
                            <div class="mb-2">
                                <input type="radio" name="venue_type" id="venue_manual" value="manual">
                                <label for="venue_manual" style="display: inline; margin-left: 5px;">Enter venue manually</label>
                            </div>
                        </div>
                        
                        <!-- Existing Venues Dropdown -->
                        <div id="existing_venue_section">
                            <select name="Venue_ID" id="Venue_ID">
                                <option value="">Choose a Venue</option>
                                <option value="1" {{ old('Venue_ID') == '1' ? 'selected' : '' }}>Grand Ballroom - Downtown (Capacity: 300)</option>
                                <option value="2" {{ old('Venue_ID') == '2' ? 'selected' : '' }}>Beach Resort - Coastal Area (Capacity: 150)</option>
                                <option value="3" {{ old('Venue_ID') == '3' ? 'selected' : '' }}>Garden Palace - City Center (Capacity: 200)</option>
                                <option value="4" {{ old('Venue_ID') == '4' ? 'selected' : '' }}>Mountain Lodge - Scenic View (Capacity: 100)</option>
                                <option value="5" {{ old('Venue_ID') == '5' ? 'selected' : '' }}>Historic Mansion - Old Town (Capacity: 250)</option>
                                <option value="6" {{ old('Venue_ID') == '6' ? 'selected' : '' }}>Rooftop Terrace - Skyline (Capacity: 80)</option>
                                <option value="7" {{ old('Venue_ID') == '7' ? 'selected' : '' }}>Country Club - Suburban (Capacity: 180)</option>
                                <option value="8" {{ old('Venue_ID') == '8' ? 'selected' : '' }}>Vineyard Estate - Wine Country (Capacity: 120)</option>
                                @foreach($venues as $venue)
                                    <option value="{{ $venue->Venue_ID }}" {{ old('Venue_ID') == $venue->Venue_ID ? 'selected' : '' }}>
                                        {{ $venue->Name }} - {{ $venue->Location }} (Capacity: {{ $venue->Capacity }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Manual Venue Input -->
                        <div id="manual_venue_section" style="display: none;">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="manual_venue_name" id="manual_venue_name" placeholder="Venue Name" value="{{ old('manual_venue_name') }}">
                                </div>
                                <div class="col">
                                    <input type="text" name="manual_venue_location" id="manual_venue_location" placeholder="Venue Location" value="{{ old('manual_venue_location') }}">
                                </div>
                                <div class="col">
                                    <input type="number" name="manual_venue_capacity" id="manual_venue_capacity" placeholder="Capacity" value="{{ old('manual_venue_capacity') }}">
                                </div>
                            </div>
                        </div>
                        
                        @error('Venue_ID')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        @error('manual_venue_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="Event_Type">Event Type</label>
                        <select name="Event_Type" id="Event_Type" required>
                            <option value="">Select Event Type</option>
                            <option value="Traditional Wedding" {{ old('Event_Type') == 'Traditional Wedding' ? 'selected' : '' }}>Traditional Wedding</option>
                            <option value="Destination Wedding" {{ old('Event_Type') == 'Destination Wedding' ? 'selected' : '' }}>Destination Wedding</option>
                            <option value="Beach Wedding" {{ old('Event_Type') == 'Beach Wedding' ? 'selected' : '' }}>Beach Wedding</option>
                            <option value="Religious Wedding" {{ old('Event_Type') == 'Religious Wedding' ? 'selected' : '' }}>Religious Wedding</option>
                            <option value="Civil Wedding" {{ old('Event_Type') == 'Civil Wedding' ? 'selected' : '' }}>Civil Wedding</option>
                            <option value="Garden Wedding" {{ old('Event_Type') == 'Garden Wedding' ? 'selected' : '' }}>Garden Wedding</option>
                            <option value="Rustic Wedding" {{ old('Event_Type') == 'Rustic Wedding' ? 'selected' : '' }}>Rustic Wedding</option>
                            <option value="Modern Wedding" {{ old('Event_Type') == 'Modern Wedding' ? 'selected' : '' }}>Modern Wedding</option>
                            <option value="Vintage Wedding" {{ old('Event_Type') == 'Vintage Wedding' ? 'selected' : '' }}>Vintage Wedding</option>
                            <option value="Luxury Wedding" {{ old('Event_Type') == 'Luxury Wedding' ? 'selected' : '' }}>Luxury Wedding</option>
                        </select>
                        @error('Event_Type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="Wedding_Date">Wedding Date</label>
                        <input type="date" name="Wedding_Date" id="Wedding_Date" value="{{ old('Wedding_Date') }}" required>
                        @error('Wedding_Date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="Client_Contact">Client Contact</label>
                        <input type="text" name="Client_Contact" id="Client_Contact" value="{{ old('Client_Contact') }}" placeholder="Phone or Email" required>
                        @error('Client_Contact')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Details -->
        <div class="form-section">
            <h3>📋 Order Details</h3>
            <div class="mb-3">
                <label for="Order_Date">Order Date</label>
                <input type="date" name="Order_Date" id="Order_Date" value="{{ old('Order_Date', date('Y-m-d')) }}" required>
                @error('Order_Date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Status">Order Status</label>
                <select name="Status" id="Status" required>
                    <option value="Pending" {{ old('Status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Confirmed" {{ old('Status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="In Progress" {{ old('Status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ old('Status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ old('Status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
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
                                           data-menu-id="{{ $menuItem->MenuItem_ID }}">
                                    <label for="menu_{{ $menuItem->MenuItem_ID }}">Select</label>
                                </div>
                            </div>
                            <p class="text-muted">{{ $menuItem->Details }}</p>
                            <div class="menu-item-details" id="details_{{ $menuItem->MenuItem_ID }}" style="display: none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="quantity_{{ $menuItem->MenuItem_ID }}">Quantity:</label>
                                        <input type="number" 
                                               name="menu_items[{{ $menuItem->MenuItem_ID }}][Quantity]" 
                                               id="quantity_{{ $menuItem->MenuItem_ID }}" 
                                               min="1" 
                                               value="1" 
                                               class="form-control">
                                        <input type="hidden" 
                                               name="menu_items[{{ $menuItem->MenuItem_ID }}][MenuItem_ID]" 
                                               value="{{ $menuItem->MenuItem_ID }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="notes_{{ $menuItem->MenuItem_ID }}">Special Notes:</label>
                                        <textarea name="menu_items[{{ $menuItem->MenuItem_ID }}][Special_Notes]" 
                                                  id="notes_{{ $menuItem->MenuItem_ID }}" 
                                                  class="form-control" 
                                                  placeholder="Any special requests or dietary requirements"></textarea>
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

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn btn-success">Create Order</button>
            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Cancel</a>
            @else
                <a href="{{ route('user.orders.index') }}" class="btn btn-secondary">Cancel</a>
            @endif
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show/hide quantity and notes when menu item is selected
    const checkboxes = document.querySelectorAll('.menu-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const menuItem = this.closest('.menu-item');
            const quantityInput = menuItem.querySelector('.menu-item-quantity');
            const notesTextarea = menuItem.querySelector('textarea');
            
            if (this.checked) {
                quantityInput.style.display = 'block';
                notesTextarea.style.display = 'block';
            } else {
                quantityInput.style.display = 'none';
                notesTextarea.style.display = 'none';
                quantityInput.value = '1';
                notesTextarea.value = '';
            }
        });
    });

    // Handle venue selection toggle
    const venueExisting = document.getElementById('venue_existing');
    const venueManual = document.getElementById('venue_manual');
    const existingVenueSection = document.getElementById('existing_venue_section');
    const manualVenueSection = document.getElementById('manual_venue_section');
    const venueSelect = document.getElementById('Venue_ID');
    const manualVenueName = document.getElementById('manual_venue_name');
    const manualVenueLocation = document.getElementById('manual_venue_location');
    const manualVenueCapacity = document.getElementById('manual_venue_capacity');

    function toggleVenueSections() {
        if (venueExisting.checked) {
            existingVenueSection.style.display = 'block';
            manualVenueSection.style.display = 'none';
            venueSelect.required = true;
            manualVenueName.required = false;
            manualVenueLocation.required = false;
            manualVenueCapacity.required = false;
        } else {
            existingVenueSection.style.display = 'none';
            manualVenueSection.style.display = 'block';
            venueSelect.required = false;
            manualVenueName.required = true;
            manualVenueLocation.required = true;
            manualVenueCapacity.required = true;
        }
    }

    venueExisting.addEventListener('change', toggleVenueSections);
    venueManual.addEventListener('change', toggleVenueSections);

    // Handle menu item checkbox interactions
    const menuCheckboxes = document.querySelectorAll('.menu-checkbox');
    menuCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const menuId = this.getAttribute('data-menu-id');
            const detailsDiv = document.getElementById('details_' + menuId);
            const quantityInput = document.getElementById('quantity_' + menuId);
            const notesInput = document.getElementById('notes_' + menuId);
            
            if (this.checked) {
                detailsDiv.style.display = 'block';
                quantityInput.required = true;
            } else {
                detailsDiv.style.display = 'none';
                quantityInput.required = false;
                quantityInput.value = '1';
                notesInput.value = '';
            }
        });
    });
});
</script>

@endsection
