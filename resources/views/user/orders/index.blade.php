@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto animate-fade-in">
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-purple-700">My Orders</h2>
            <a href="/user/orders/create" class="bg-gradient-to-r from-purple-500 to-blue-500 text-white px-5 py-2 rounded-lg shadow hover:scale-105 transition-transform duration-300 animate-pop">Create Order</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-gradient-to-r from-purple-100 to-blue-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Order #</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($orders as $order)
                        <tr class="hover:bg-purple-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-purple-700">{{ $order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">${{ number_format($order->total, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="/user/orders/{{ $order->id }}" class="text-blue-600 hover:text-purple-600 font-semibold transition">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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