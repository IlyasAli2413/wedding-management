<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh]">
    <div class="w-full max-w-3xl">
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 animate-fade-in">
            <h1 class="text-3xl font-bold text-blue-700 mb-2">Welcome, Admin!</h1>
            <p class="text-gray-600 mb-4">This is your admin dashboard. Use the navigation above to manage users, venues, staff, and more.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <a href="/admin/staffmembers" class="block bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-xl p-6 shadow-lg hover:scale-105 transition-transform duration-300 animate-pop">
                    <div class="text-xl font-semibold mb-2">Staff Members</div>
                    <div class="text-sm">Manage all staff members.</div>
                </a>
                <a href="/admin/venues" class="block bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-xl p-6 shadow-lg hover:scale-105 transition-transform duration-300 animate-pop">
                    <div class="text-xl font-semibold mb-2">Venues</div>
                    <div class="text-sm">View and manage all venues.</div>
                </a>
                <a href="/admin/orders" class="block bg-gradient-to-r from-blue-400 to-purple-400 text-white rounded-xl p-6 shadow-lg hover:scale-105 transition-transform duration-300 animate-pop">
                    <div class="text-xl font-semibold mb-2">Orders</div>
                    <div class="text-sm">View all wedding orders.</div>
                </a>
                <a href="/admin/payments" class="block bg-gradient-to-r from-purple-400 to-blue-400 text-white rounded-xl p-6 shadow-lg hover:scale-105 transition-transform duration-300 animate-pop">
                    <div class="text-xl font-semibold mb-2">Payments</div>
                    <div class="text-sm">Manage and review payments.</div>
                </a>
            </div>
        </div>
    </div>
</div>
<style>
@keyframes fade-in {
  from { opacity: 0; }
  to { opacity: 1; }
}
.animate-fade-in {
  animation: fade-in 1s ease-in;
}
@keyframes pop {
  0% { transform: scale(0.95); }
  60% { transform: scale(1.05); }
  100% { transform: scale(1); }
}
.animate-pop:hover {
  animation: pop 0.2s;
}
</style>
@endsection 
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Wedding Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            margin: 0;
            color: #333;
        }
        .navbar {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 1.2rem 2.2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 16px rgba(246, 83, 144, 0.08);
        }
        .navbar h1 {
            font-size: 2rem;
            letter-spacing: 1px;
        }
        .navbar .user-info {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }
        .avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.7rem;
            margin-right: 0.5rem;
            box-shadow: 0 2px 8px rgba(246, 83, 144, 0.10);
        }
        .logout-btn {
            background: rgba(255, 255, 255, 0.18);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s;
        }
        .logout-btn:hover {
            background: rgba(255,255,255,0.32);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2.5rem 1rem 1.5rem 1rem;
        }
        .hero-section {
            background: white;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(246, 83, 144, 0.10);
            padding: 2.5rem 2rem 2rem 2rem;
            margin-bottom: 2.5rem;
            display: flex;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }
        .hero-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.7rem;
            color: #fff;
            box-shadow: 0 2px 12px rgba(246, 83, 144, 0.13);
        }
        .hero-content h2 {
            color: #f5576c;
            font-size: 2.1rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }
        .hero-content p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 0.2rem;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2.2rem;
        }
        .stat-card {
            background: #fff;
            padding: 2rem 1.2rem;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(102, 126, 234, 0.08);
            text-align: center;
            position: relative;
        }
        .stat-icon {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            color: #764ba2;
        }
        .stat-number {
            font-size: 2.3rem;
            font-weight: bold;
            color: #f093fb;
            margin-bottom: 0.3rem;
        }
        .stat-label {
            color: #666;
            font-size: 1rem;
        }
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2.2rem;
        }
        .action-card {
            background: #fff;
            padding: 1.7rem 1.2rem;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(246, 83, 144, 0.08);
            text-align: center;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .action-card:hover {
            box-shadow: 0 8px 24px rgba(246, 83, 144, 0.13);
            transform: translateY(-3px) scale(1.03);
        }
        .action-card h3 {
            margin-bottom: 1.1rem;
            color: #764ba2;
            font-size: 1.2rem;
        }
        .action-btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 1.7rem;
            border-radius: 7px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05rem;
            transition: background 0.2s, transform 0.2s;
            margin-top: 0.5rem;
        }
        .action-btn:hover {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            transform: translateY(-2px) scale(1.04);
        }
        .recent-section {
            background: #fff;
            padding: 1.7rem 1.2rem;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(102, 126, 234, 0.08);
            margin-bottom: 1.2rem;
        }
        .recent-section h3 {
            margin-bottom: 1.1rem;
            color: #f5576c;
            font-size: 1.15rem;
        }
        .recent-item {
            padding: 0.9rem 0.2rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .recent-item:last-child {
            border-bottom: none;
        }
        .view-btn {
            background: #764ba2;
            color: white;
            padding: 0.32rem 1.1rem;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 600;
            transition: background 0.2s;
        }
        .view-btn:hover {
            background: #f093fb;
        }
        .empty-state, .recent-section p {
            text-align: center;
            color: #999;
            padding: 2.2rem 0;
            font-size: 1.1rem;
        }
        footer {
            text-align: center;
            color: #fff;
            padding: 1.2rem 0 0.7rem 0;
            font-size: 1rem;
            letter-spacing: 0.5px;
            background: transparent;
        }
        @media (max-width: 900px) {
            .hero-section {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
                gap: 1.2rem;
            }
        }
        @media (max-width: 600px) {
            .container {
                padding: 1rem 0.2rem;
            }
            .hero-section {
                padding: 1.2rem 0.7rem;
            }
        }
        .action-btn, .view-btn {
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        }
        .action-btn:hover, .view-btn:hover {
            transform: translateY(-3px) scale(1.07);
            box-shadow: 0 8px 24px rgba(246, 83, 144, 0.18);
        }
        .action-card, .stat-card {
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .action-card:hover, .stat-card:hover {
            box-shadow: 0 12px 32px rgba(102, 126, 234, 0.18);
            transform: translateY(-4px) scale(1.03);
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>👑 Admin Dashboard</h1>
        <div class="user-info">
            <div class="avatar">🧑‍💼</div>
            <span>Welcome, Admin!</span>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="hero-avatar">🛡️</div>
            <div class="hero-content">
                <h2>Hello, Admin!</h2>
                <p>Welcome to your powerful admin dashboard. Here you can manage all orders, payments, venues, menu items, and users with ease and style.</p>
            </div>
        </div>
        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📦</div>
                <div class="stat-number">{{ $stats['total_orders'] }}</div>
                <div class="stat-label">Total Orders</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">💳</div>
                <div class="stat-number">{{ $stats['total_payments'] }}</div>
                <div class="stat-label">Total Payments</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🏛️</div>
                <div class="stat-number">{{ $stats['total_venues'] }}</div>
                <div class="stat-label">Total Venues</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🍽️</div>
                <div class="stat-number">{{ $stats['total_menu_items'] }}</div>
                <div class="stat-label">Menu Items</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-number">{{ $stats['total_users'] }}</div>
                <div class="stat-label">Registered Users</div>
            </div>
        </div>
        <!-- Quick Actions -->
        <div class="actions-grid">
            <div class="action-card">
                <h3>Manage Orders</h3>
                <a href="{{ route('admin.orders.index') }}" class="action-btn">📦 View All Orders</a>
            </div>
            <div class="action-card">
                <h3>Manage Payments</h3>
                <a href="{{ route('admin.payments.index') }}" class="action-btn">💳 View All Payments</a>
            </div>
            <div class="action-card">
                <h3>Manage Venues</h3>
                <a href="{{ route('admin.venues.index') }}" class="action-btn">🏛️ View All Venues</a>
            </div>
            <div class="action-card">
                <h3>Manage Menu Items</h3>
                <a href="{{ route('admin.menu-items.index') }}" class="action-btn">🍽️ View All Menu Items</a>
            </div>
        </div>
        <!-- Recent Orders -->
        <div class="recent-section">
            <h3>Recent Orders</h3>
            @forelse($recent_orders as $order)
                <div class="recent-item">
                    <div>
                        <strong>Order #{{ $order->Order_ID }}</strong>
                        <br>
                        <small>{{ $order->client->Name ?? 'N/A' }} - {{ $order->Status }}</small>
                    </div>
                    <a href="{{ route('admin.orders.show', $order->Order_ID) }}" class="view-btn">View</a>
                </div>
            @empty
                <p>No recent orders</p>
            @endforelse
        </div>
        <!-- Recent Payments -->
        <div class="recent-section">
            <h3>Recent Payments</h3>
            @forelse($recent_payments as $payment)
                <div class="recent-item">
                    <div>
                        <strong>Payment #{{ $payment->Payment_ID }}</strong>
                        <br>
                        <small>Rs. {{ number_format($payment->Amount, 2) }} - {{ $payment->Status }}</small>
                    </div>
                    <a href="{{ route('admin.payments.show', $payment->Payment_ID) }}" class="view-btn">View</a>
                </div>
            @empty
                <p>No recent payments</p>
            @endforelse
        </div>
    </div>
    <footer>
        &copy; {{ date('Y') }} Wedding Management System. Crafted with <span style="color: #f5576c;">&#10084;</span> for your special day.
    </footer>
</body>
</html> 
>>>>>>> eb2100bd96d0077ca1685dce352220888af84177
