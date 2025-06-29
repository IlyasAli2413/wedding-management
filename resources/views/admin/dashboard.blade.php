<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Wedding Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            color: #333;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 1.5rem;
        }

        .navbar .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .action-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .action-card h3 {
            margin-bottom: 1rem;
            color: #333;
        }

        .action-btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: transform 0.2s;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .recent-section {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }

        .recent-section h3 {
            margin-bottom: 1rem;
            color: #333;
        }

        .recent-item {
            padding: 0.75rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .recent-item:last-child {
            border-bottom: none;
        }

        .view-btn {
            background: #667eea;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 3px;
            text-decoration: none;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>👑 Admin Dashboard</h1>
        <div class="user-info">
            <span>Welcome, Admin!</span>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ $stats['total_orders'] }}</div>
                <div class="stat-label">Total Orders</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $stats['total_payments'] }}</div>
                <div class="stat-label">Total Payments</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $stats['total_venues'] }}</div>
                <div class="stat-label">Total Venues</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $stats['total_menu_items'] }}</div>
                <div class="stat-label">Menu Items</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $stats['total_users'] }}</div>
                <div class="stat-label">Registered Users</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="actions-grid">
            <div class="action-card">
                <h3>Manage Orders</h3>
                <a href="{{ route('admin.orders.index') }}" class="action-btn">View All Orders</a>
            </div>
            <div class="action-card">
                <h3>Manage Payments</h3>
                <a href="{{ route('admin.payments.index') }}" class="action-btn">View All Payments</a>
            </div>
            <div class="action-card">
                <h3>Manage Venues</h3>
                <a href="{{ route('admin.venues.index') }}" class="action-btn">View All Venues</a>
            </div>
            <div class="action-card">
                <h3>Manage Menu Items</h3>
                <a href="{{ route('admin.menu-items.index') }}" class="action-btn">View All Menu Items</a>
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
                        <small>${{ number_format($payment->Amount, 2) }} - {{ $payment->Status }}</small>
                    </div>
                    <a href="{{ route('admin.payments.show', $payment->Payment_ID) }}" class="view-btn">View</a>
                </div>
            @empty
                <p>No recent payments</p>
            @endforelse
        </div>
    </div>
</body>
</html> 