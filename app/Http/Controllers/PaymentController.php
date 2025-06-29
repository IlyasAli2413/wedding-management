<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Show all payments with order and user (Admin)
    public function index()
    {
        $payments = Payment::with(['order', 'user'])->get();
        return view('payments.index', compact('payments'));
    }

    // Show user's payments only (User)
    public function userIndex()
    {
        $payments = Payment::with(['order', 'user'])
            ->where('User_ID', Auth::id())
            ->get();
        return view('payments.index', compact('payments'));
    }

    // Show form to create a new payment
    public function create()
    {
        // For users, only show their orders
        if (Auth::user()->isUser()) {
            $orders = Order::where('User_ID', Auth::id())->get();
        } else {
            $orders = Order::all();
        }
        return view('payments.create', compact('orders'));
    }

    // Store new payment
   public function store(Request $request)
{
    $validated = $request->validate([
        'Order_ID'      => 'required|exists:order,Order_ID',
        'Payment_Date'  => 'required|date',
        'Amount'        => 'required|numeric|min:0',
        'Method'        => 'required|string|max:100',
    ]);

    // For users, ensure they can only pay for their own orders
    if (Auth::user()->isUser()) {
        $order = Order::findOrFail($validated['Order_ID']);
        if ($order->User_ID !== Auth::id()) {
            abort(403, 'Access denied.');
        }
    }

    $validated['User_ID'] = auth()->id(); // ✅ this is required

    Payment::create($validated);

    // Redirect based on user role
    if (Auth::user()->isAdmin()) {
        return redirect()->route('admin.payments.index')->with('success', 'Payment recorded successfully.');
    } else {
        return redirect()->route('user.payments.index')->with('success', 'Payment recorded successfully.');
    }
}


    // Show one payment
    public function show($id)
    {
        $payment = Payment::with(['order', 'user'])->findOrFail($id);
        
        // Check if user can view this payment
        if (!Auth::user()->isAdmin() && $payment->User_ID !== Auth::id()) {
            abort(403, 'Access denied.');
        }
        
        return view('payments.show', compact('payment'));
    }

    // Show form to edit an existing payment
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        
        // Check if user can edit this payment
        if (!Auth::user()->isAdmin() && $payment->User_ID !== Auth::id()) {
            abort(403, 'Access denied.');
        }
        
        // For users, only show their orders
        if (Auth::user()->isUser()) {
            $orders = Order::where('User_ID', Auth::id())->get();
        } else {
            $orders = Order::all();
        }
        
        return view('payments.edit', compact('payment', 'orders'));
    }

    // Update existing payment
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Payment_Date'  => 'required|date',
            'Amount'        => 'required|numeric|min:0',
            'Method'        => 'required|string|max:100',
        ]);

        $payment = Payment::findOrFail($id);
        
        // Check if user can update this payment
        if (!Auth::user()->isAdmin() && $payment->User_ID !== Auth::id()) {
            abort(403, 'Access denied.');
        }
        
        $payment->update($validated);

        // Redirect based on user role
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully.');
        } else {
            return redirect()->route('user.payments.index')->with('success', 'Payment updated successfully.');
        }
    }

    // Delete a payment
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        
        // Check if user can delete this payment
        if (!Auth::user()->isAdmin() && $payment->User_ID !== Auth::id()) {
            abort(403, 'Access denied.');
        }
        
        $payment->delete();

        // Redirect based on user role
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully.');
        } else {
            return redirect()->route('user.payments.index')->with('success', 'Payment deleted successfully.');
        }
    }
}
