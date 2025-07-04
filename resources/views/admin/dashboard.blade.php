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