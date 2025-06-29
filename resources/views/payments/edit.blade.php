@extends('layouts.app')
@section('title', 'Edit Payment')

@section('content')
<h2 style="margin-bottom: 20px; color: #333;">💰 Edit Payment</h2>

@if(Auth::user()->isAdmin())
    <form action="{{ route('admin.payments.update', $payment->Payment_ID) }}" method="POST">
@else
    <form action="{{ route('user.payments.update', $payment->Payment_ID) }}" method="POST">
@endif
    @csrf
    @method('PUT')
    
    <div style="margin-bottom: 15px;">
        <label for="Order_ID" style="display: block; margin-bottom: 5px; font-weight: bold;">Order ID:</label>
        <input type="number" id="Order_ID" name="Order_ID" value="{{ $payment->Order_ID }}" required 
               style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="Payment_Date" style="display: block; margin-bottom: 5px; font-weight: bold;">Payment Date:</label>
        <input type="date" id="Payment_Date" name="Payment_Date" value="{{ $payment->Payment_Date }}" required 
               style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="Amount" style="display: block; margin-bottom: 5px; font-weight: bold;">Amount:</label>
        <input type="number" id="Amount" name="Amount" value="{{ $payment->Amount }}" step="0.01" required 
               style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="Method" style="display: block; margin-bottom: 5px; font-weight: bold;">Payment Method:</label>
        <select id="Method" name="Method" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            <option value="Cash" {{ $payment->Method == 'Cash' ? 'selected' : '' }}>Cash</option>
            <option value="Credit Card" {{ $payment->Method == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
            <option value="Debit Card" {{ $payment->Method == 'Debit Card' ? 'selected' : '' }}>Debit Card</option>
            <option value="Bank Transfer" {{ $payment->Method == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
            <option value="Digital Wallet" {{ $payment->Method == 'Digital Wallet' ? 'selected' : '' }}>Digital Wallet</option>
        </select>
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="Status" style="display: block; margin-bottom: 5px; font-weight: bold;">Status:</label>
        <select id="Status" name="Status" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            <option value="Pending" {{ $payment->Status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Completed" {{ $payment->Status == 'Completed' ? 'selected' : '' }}>Completed</option>
            <option value="Failed" {{ $payment->Status == 'Failed' ? 'selected' : '' }}>Failed</option>
            <option value="Refunded" {{ $payment->Status == 'Refunded' ? 'selected' : '' }}>Refunded</option>
        </select>
    </div>
    
    <div style="margin-top: 20px;">
        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px;">Update Payment</button>
        @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.payments.index') }}" style="padding: 10px 20px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Cancel</a>
        @else
            <a href="{{ route('user.payments.index') }}" style="padding: 10px 20px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Cancel</a>
        @endif
    </div>
</form>
@endsection
