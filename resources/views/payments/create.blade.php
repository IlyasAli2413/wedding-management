@extends('layouts.app')
@section('title', 'Create Payment')

@section('content')
<h2 style="margin-bottom: 20px; color: #333;">💰 Create New Payment</h2>

@if(Auth::user()->isAdmin())
    <form action="{{ route('admin.payments.store') }}" method="POST">
@else
    <form action="{{ route('user.payments.store') }}" method="POST">
@endif
    @csrf
    
    <div style="margin-bottom: 15px;">
        <label for="Order_ID" style="display: block; margin-bottom: 5px; font-weight: bold;">Order ID:</label>
        <input type="number" id="Order_ID" name="Order_ID" required 
               style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="Payment_Date" style="display: block; margin-bottom: 5px; font-weight: bold;">Payment Date:</label>
        <input type="date" id="Payment_Date" name="Payment_Date" required 
               style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="Amount" style="display: block; margin-bottom: 5px; font-weight: bold;">Amount:</label>
        <input type="number" id="Amount" name="Amount" step="0.01" required 
               style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="Method" style="display: block; margin-bottom: 5px; font-weight: bold;">Payment Method:</label>
        <select id="Method" name="Method" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            <option value="">Select Payment Method</option>
            <option value="Cash">Cash</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Bank Transfer">Bank Transfer</option>
            <option value="Digital Wallet">Digital Wallet</option>
        </select>
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="Status" style="display: block; margin-bottom: 5px; font-weight: bold;">Status:</label>
        <select id="Status" name="Status" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            <option value="">Select Status</option>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
            <option value="Failed">Failed</option>
            <option value="Refunded">Refunded</option>
        </select>
    </div>
    
    <div style="margin-top: 20px;">
        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px;">Create Payment</button>
        @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.payments.index') }}" style="padding: 10px 20px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Cancel</a>
        @else
            <a href="{{ route('user.payments.index') }}" style="padding: 10px 20px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Cancel</a>
        @endif
    </div>
</form>
@endsection
