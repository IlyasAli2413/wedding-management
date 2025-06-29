<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Venue;
use App\Models\WeddingMenuItem;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_orders' => Order::count(),
            'total_payments' => Payment::count(),
            'total_venues' => Venue::count(),
            'total_menu_items' => WeddingMenuItem::count(),
            'total_users' => User::where('role', 'user')->count(),
        ];

        $recent_orders = Order::with(['client', 'wedding.venue'])
            ->latest()
            ->take(5)
            ->get();

        $recent_payments = Payment::with(['order'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_orders', 'recent_payments'));
    }
}
