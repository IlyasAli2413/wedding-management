<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $user_orders = Order::where('User_ID', $user->id)
            ->with(['client', 'wedding.venue'])
            ->latest()
            ->take(5)
            ->get();

        $user_payments = Payment::where('User_ID', $user->id)
            ->with(['order'])
            ->latest()
            ->take(5)
            ->get();

        $stats = [
            'total_orders' => Order::where('User_ID', $user->id)->count(),
            'total_payments' => Payment::where('User_ID', $user->id)->count(),
        ];

        // Debug: Log the payments being sent to the dashboard
        Log::info('Payments for dashboard:', $user_payments->toArray());

        return view('dashboard', compact('user_orders', 'user_payments', 'stats'));
    }
}
