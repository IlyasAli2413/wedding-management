@extends('layouts.app')
@section('title', 'Assign Menu to Wedding')

@section('content')
<h2>Assign Menu Item to Wedding Order</h2>

<form action="{{ route('wedding_events.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Order</label>
        <select name="Order_ID" class="form-control" required>
            <option value="">-- Select Order --</option>
            @foreach ($orders as $order)
                <option value="{{ $order->Order_ID }}">{{ $order->Order_ID }} - {{ $order->Status }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Menu Item</label>
        <select name="MenuItem_ID" class="form-control" required>
            <option value="">-- Select Menu Item --</option>
            @foreach ($menuItems as $item)
                <option value="{{ $item->MenuItem_ID }}">{{ $item->Name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="Quantity" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Special Notes</label>
        <textarea name="Special_Notes" class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('wedding_events.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
