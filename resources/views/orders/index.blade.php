@extends('layouts.app')

@section('title', 'Orders')

@section('content')

<style>
    .container {
        max-width: 1000px;
        margin: 30px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        margin: 2px;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #000;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #bd2130;
    }

    .btn-info {
        background-color: #17a2b8;
        color: #fff;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .alert {
        padding: 10px;
        background-color: #d4edda;
        color: #155724;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    th, td {
        padding: 12px;
        border: 1px solid #dee2e6;
        text-align: center;
    }

    th {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    form {
        display: inline-block;
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

<div class="container">
    <h2>📦 {{ Auth::user()->isAdmin() ? 'All Orders' : 'My Orders' }}</h2>

    @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.orders.create') }}" class="btn btn-primary mb-3">+ Add New Order</a>
    @else
        <a href="{{ route('user.orders.create') }}" class="btn btn-primary mb-3">+ Add New Order</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Client</th>
                <th>Wedding Type</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->Order_ID }}</td>
                    <td>
                        @if($order->client)
                            {{ $order->client->Name ?? 'Client ' . $order->Client_ID }}
                        @else
                            Client {{ $order->Client_ID }}
                        @endif
                    </td>
                    <td>{{ $order->Wedding_Type ?? 'Not specified' }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->Order_Date)->format('M d, Y') }}</td>
                    <td>
                        <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $order->Status)) }}">
                            {{ $order->Status }}
                        </span>
                    </td>
                    <td>
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.orders.show', $order->Order_ID) }}" class="btn-sm btn-info">View</a>
                            <a href="{{ route('admin.orders.edit', $order->Order_ID) }}" class="btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.orders.destroy', $order->Order_ID) }}" method="POST">
                        @else
                            <a href="{{ route('user.orders.show', $order->Order_ID) }}" class="btn-sm btn-info">View</a>
                            <a href="{{ route('user.orders.edit', $order->Order_ID) }}" class="btn-sm btn-warning">Edit</a>
                            <form action="{{ route('user.orders.destroy', $order->Order_ID) }}" method="POST">
                        @endif
                            @csrf
                            @method('DELETE')
                            <button class="btn-sm btn-danger" onclick="return confirm('Delete this order?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 20px;">
                        <p>No orders found.</p>
                        @if(!Auth::user()->isAdmin())
                            <a href="{{ route('user.orders.create') }}" class="btn btn-primary">Create Your First Order</a>
                        @endif
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
