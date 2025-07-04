@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto animate-fade-in">
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-purple-700">Menu Items</h2>
            <a href="/user/menu-items/create" class="bg-gradient-to-r from-purple-500 to-blue-500 text-white px-5 py-2 rounded-lg shadow hover:scale-105 transition-transform duration-300 animate-pop">Add Menu Item</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-gradient-to-r from-purple-100 to-blue-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Item Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($menuItems as $item)
                        <tr class="hover:bg-purple-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-purple-700">{{ $item->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->category }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item->price, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="/user/menu-items/{{ $item->id }}" class="text-blue-600 hover:text-purple-600 font-semibold transition">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No menu items found.</td>
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