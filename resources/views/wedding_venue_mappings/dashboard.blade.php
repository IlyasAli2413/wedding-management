@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h2 class="mb-4">📊 Wedding Management Dashboard</h2>

<div class="row g-4">
    @php
        $items = [
            ['Orders', $orderCount, 'orders'],
            ['Payments', $paymentCount, 'payments'],
            ['Weddings', $weddingCount, 'orders'],
            ['Venues', $venueCount, 'venues'],
            ['Staff', $staffCount, 'staffmembers'],
            ['Chefs', $chefCount, 'weddingchefs'],
            ['Servers', $serverCount, 'weddingservers'],
            ['Planners', $plannerCount, 'weddingplanners'],
            ['Menu Items', $menuItemCount, 'wedding_menu_items'],
            ['Inventory', $inventoryCount, 'inventory_items'],
            ['Venue Mappings', $venueMappingCount, 'wedding_venue_mappings'],
        ];
    @endphp

    @foreach($items as [$label, $count, $route])
    <div class="col-md-4">
        <div class="card shadow rounded p-3 border-0 bg-light">
            <h4>{{ $label }}</h4>
            <p class="fs-2">{{ $count }}</p>
            <a href="{{ route($route . '.index') }}" class="btn btn-primary btn-sm">View All</a>
        </div>
    </div>
    @endforeach
</div>
@endsection

