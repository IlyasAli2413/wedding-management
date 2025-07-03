@extends('layouts.app')
@section('title', 'Payment Details')

@section('content')
<h2 style="margin-bottom: 20px; color: #333;">💰 Payment Details</h2>

<div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
    <div style="margin-bottom: 10px;">
        <strong>Payment ID:</strong> {{ $payment->Payment_ID }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Order ID:</strong> {{ $payment->Order_ID }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Payment Date:</strong> {{ $payment->Payment_Date }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Amount:</strong> Rs. {{ $payment->Amount }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Payment Method:</strong> {{ $payment->Method }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Status:</strong> {{ $payment->Status }}
    </div>
    @if($payment->screenshot_path)
        <div style="margin-bottom: 10px;">
            <strong>Payment Screenshot:</strong><br>
            <img src="{{ asset('storage/' . $payment->screenshot_path) }}" alt="Payment Screenshot" style="max-width: 300px; border-radius: 8px; margin-top: 8px;">
        </div>
    @endif
</div>

<div style="margin-top: 20px;">
    @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.payments.index') }}" style="padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px;">Back to Payments</a>
        <a href="{{ route('admin.payments.edit', $payment->Payment_ID) }}" style="padding: 10px 20px; background-color: #ffc107; color: #212529; text-decoration: none; border-radius: 4px; margin-right: 10px;">Edit Payment</a>
    @else
        <a href="{{ route('user.payments.index') }}" style="padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px;">Back to Payments</a>
        <a href="{{ route('user.payments.edit', $payment->Payment_ID) }}" style="padding: 10px 20px; background-color: #ffc107; color: #212529; text-decoration: none; border-radius: 4px; margin-right: 10px;">Edit Payment</a>
    @endif
</div>
@endsection
