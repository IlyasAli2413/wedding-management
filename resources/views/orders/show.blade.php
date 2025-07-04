@extends('layouts.app')
@section('title', 'Order Details')

@section('content')

<style>
    .order-details-container {
        max-width: 600px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .order-details-container h2 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    .list-item {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 6px;
        background-color: #f9f9f9;
    }

    .list-item strong {
        display: inline-block;
        width: 120px;
        color: #555;
    }

    .btn-back {
        display: inline-block;
        margin-top: 20px;
        padding: 8px 16px;
        background-color: #6c757d;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
    }

    .btn-back:hover {
        background-color: #5a6268;
    }

    .status-badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: bold;
    }

    .status-pending { background-color: #fff3cd; color: #856404; }
    .status-confirmed { background-color: #d1ecf1; color: #0c5460; }
    .status-progress { background-color: #d4edda; color: #155724; }
    .status-completed { background-color: #c3e6cb; color: #155724; }
    .status-cancelled { background-color: #f5c6cb; color: #721c24; }
</style>

<div class="order-details-container">
    <h2>Order Details</h2>

    <div class="list-item"><strong>Order ID:</strong> {{ $order->Order_ID }}</div>
    <div class="list-item"><strong>Client:</strong> {{ $order->client->Name ?? 'Client ' . $order->Client_ID }}</div>
    <div class="list-item"><strong>Wedding Type:</strong> {{ $order->wedding->Event_Type ?? 'Not specified' }}</div>
    <div class="list-item"><strong>Order Date:</strong> {{ \Carbon\Carbon::parse($order->Order_Date)->format('M d, Y') }}</div>
    <div class="list-item">
        <strong>Status:</strong> 
        <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $order->Status)) }}">
            {{ $order->Status }}
        </span>
    </div>

    @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.orders.index') }}" class="btn-back">← Back</a>
    @else
        <a href="{{ route('user.orders.index') }}" class="btn-back">← Back</a>
    @endif
</div>

@endsection
