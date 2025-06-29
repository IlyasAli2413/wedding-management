@extends('layouts.app')
@section('title', 'All Payments')

@section('content')
<h2 style="margin-bottom: 20px; color: #333;">💰 {{ Auth::user()->isAdmin() ? 'All Payments' : 'My Payments' }}</h2>

@if(Auth::user()->isAdmin())
    <a href="{{ route('admin.payments.create') }}" 
       style="display: inline-block; padding: 8px 16px; background-color: #198754; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 15px;">
       + Add New Payment
    </a>
@else
    <a href="{{ route('user.payments.create') }}" 
       style="display: inline-block; padding: 8px 16px; background-color: #198754; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 15px;">
       + Add New Payment
    </a>
@endif

@if (session('success'))
    <div style="padding: 10px; background-color: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f8f9fa;">
            <th style="border: 1px solid #dee2e6; padding: 10px;">Payment ID</th>
            <th style="border: 1px solid #dee2e6; padding: 10px;">Order ID</th>
            <th style="border: 1px solid #dee2e6; padding: 10px;">Date</th>
            <th style="border: 1px solid #dee2e6; padding: 10px;">Amount</th>
            <th style="border: 1px solid #dee2e6; padding: 10px;">Method</th>
            <th style="border: 1px solid #dee2e6; padding: 10px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($payments as $payment)
        <tr>
            <td style="border: 1px solid #dee2e6; padding: 10px;">{{ $payment->Payment_ID }}</td>
            <td style="border: 1px solid #dee2e6; padding: 10px;">{{ $payment->Order_ID }}</td>
            <td style="border: 1px solid #dee2e6; padding: 10px;">{{ $payment->Payment_Date }}</td>
            <td style="border: 1px solid #dee2e6; padding: 10px;">Rs. {{ $payment->Amount }}</td>
            <td style="border: 1px solid #dee2e6; padding: 10px;">{{ $payment->Method }}</td>
            <td style="border: 1px solid #dee2e6; padding: 10px;">
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.payments.show', $payment->Payment_ID) }}" style="color: blue; margin-right: 8px;">View</a>
                    <a href="{{ route('admin.payments.edit', $payment->Payment_ID) }}" style="color: orange; margin-right: 8px;">Edit</a>
                    <form action="{{ route('admin.payments.destroy', $payment->Payment_ID) }}" method="POST" style="display:inline;">
                @else
                    <a href="{{ route('user.payments.show', $payment->Payment_ID) }}" style="color: blue; margin-right: 8px;">View</a>
                    <a href="{{ route('user.payments.edit', $payment->Payment_ID) }}" style="color: orange; margin-right: 8px;">Edit</a>
                    <form action="{{ route('user.payments.destroy', $payment->Payment_ID) }}" method="POST" style="display:inline;">
                @endif
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this payment?')" style="color: red; background: none; border: none; cursor: pointer;">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align: center; padding: 15px;">No payments found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
