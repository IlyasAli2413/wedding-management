@extends('layouts.app')
@section('title', 'Create Payment')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Montserrat', Arial, sans-serif;
        background: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);
        min-height: 100vh;
        margin: 0;
    }
    .payment-glass {
        background: rgba(255,255,255,0.85);
        border-radius: 24px;
        box-shadow: 0 12px 40px rgba(102, 126, 234, 0.18);
        padding: 48px 36px 32px 36px;
        max-width: 600px;
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
    .text-danger {
        color: #e74c3c;
        font-size: 0.97em;
        margin-top: 2px;
    }
    @media (max-width: 700px) {
        .payment-glass { padding: 8px 1vw; }
        .form-section { padding: 10px 2vw; }
    }
</style>

<h2 style="margin-bottom: 20px; color: #333;">💰 Create New Payment</h2>

@if(Auth::user()->isAdmin())
    <form action="{{ route('admin.payments.store') }}" method="POST" enctype="multipart/form-data">
@else
    <form action="{{ route('user.payments.store') }}" method="POST" enctype="multipart/form-data">
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
