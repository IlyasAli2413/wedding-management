@extends('layouts.app')
@section('title', 'Create New Order')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Montserrat', Arial, sans-serif;
        background: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);
        min-height: 100vh;
        margin: 0;
    }
    .order-glass {
        background: rgba(255,255,255,0.85);
        border-radius: 24px;
        box-shadow: 0 12px 40px rgba(102, 126, 234, 0.18);
        padding: 48px 36px 32px 36px;
        max-width: 950px;
        margin: 48px auto 32px auto;
        position: relative;
        backdrop-filter: blur(8px);
        border: 1.5px solid rgba(255,255,255,0.35);
    }
    .stepper {
        display: flex;
        justify-content: space-between;
        margin-bottom: 36px;
        padding: 0 10px;
    }
    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
        color: #f5576c;
        font-weight: 700;
        font-size: 1.1em;
        opacity: 0.7;
    }
    .step.active {
        color: #6a11cb;
        opacity: 1;
    }
    .step .icon {
        font-size: 2.1em;
        margin-bottom: 6px;
    }
    .form-section {
        background: rgba(255,255,255,0.7);
        border-radius: 16px;
        padding: 28px 22px 14px 22px;
        margin-bottom: 32px;
        box-shadow: 0 2px 12px rgba(102, 126, 234, 0.09);
    }
    .form-section h3 {
        font-size: 1.2em;
        color: #f5576c;
        font-weight: 700;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .form-section h3 .icon {
        font-size: 1.5em;
    }
    .floating-label {
        position: relative;
        margin-bottom: 22px;
    }
    .floating-label input,
    .floating-label select,
    .floating-label textarea {
        width: 100%;
        border: 1.5px solid #e0e0e0;
        border-radius: 8px;
        padding: 14px 12px 14px 12px;
        font-size: 1em;
        background: transparent;
        outline: none;
        transition: border 0.2s, box-shadow 0.2s;
        box-shadow: none;
    }
    .floating-label input:focus,
    .floating-label select:focus,
    .floating-label textarea:focus {
        border: 1.5px solid #f5576c;
        box-shadow: 0 2px 12px rgba(246, 83, 144, 0.10);
    }
    .floating-label label {
        position: absolute;
        top: 14px;
        left: 14px;
        color: #888;
        font-size: 1em;
        background: transparent;
        pointer-events: none;
        transition: 0.2s;
        font-weight: 500;
    }
    .floating-label input:focus + label,
    .floating-label input:not(:placeholder-shown) + label,
    .floating-label select:focus + label,
    .floating-label select:not([value=""]) + label,
    .floating-label textarea:focus + label,
    .floating-label textarea:not(:placeholder-shown) + label {
        top: -10px;
        left: 10px;
        font-size: 0.88em;
        color: #f5576c;
        background: #fff;
        padding: 0 4px;
    }
    .btn-success {
        background: linear-gradient(90deg, #f857a6 0%, #ff5858 100%);
        border: none;
        color: #fff;
        font-weight: 700;
        font-size: 1.2em;
        border-radius: 10px;
        padding: 16px 40px;
        box-shadow: 0 6px 24px rgba(246, 83, 144, 0.18);
        transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        margin-top: 18px;
        text-shadow: 0 2px 8px #fda08544;
        outline: none;
        position: relative;
        z-index: 1;
    }
    .btn-success:hover {
        background: linear-gradient(90deg, #ff5858 0%, #f857a6 100%);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 12px 32px rgba(246, 83, 144, 0.22);
        filter: brightness(1.08);
    }
    .btn-secondary {
        background: #e0e0e0;
        color: #333;
        border-radius: 8px;
        font-weight: 600;
        margin-left: 10px;
    }
    .menu-item {
        background: rgba(255,255,255,0.85);
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.07);
        padding: 18px 18px 10px 18px;
        margin-bottom: 18px;
    }
    .menu-item-header strong {
        color: #6a11cb;
    }
    .text-danger {
        color: #e74c3c;
        font-size: 0.97em;
        margin-top: 2px;
    }
    @media (max-width: 900px) {
        .order-glass { padding: 18px 2vw; }
    }
    @media (max-width: 700px) {
        .order-glass { padding: 8px 1vw; }
        .form-section { padding: 10px 2vw; }
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
