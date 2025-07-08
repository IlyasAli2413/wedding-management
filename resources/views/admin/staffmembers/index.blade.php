@extends('layouts.app')
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 43e2df2a0413232a06535f2cd7a87dbc6265dce8

@section('content')
<div class="max-w-5xl mx-auto animate-fade-in">
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-blue-700">Staff Members</h2>
            <a href="/admin/staffmembers/create" class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-5 py-2 rounded-lg shadow hover:scale-105 transition-transform duration-300 animate-pop">Add Staff</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-gradient-to-r from-blue-100 to-purple-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($staffmembers as $staff)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-blue-700">{{ $staff->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $staff->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700">
                                    {{ ucfirst($staff->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="/admin/staffmembers/{{ $staff->id }}" class="text-blue-600 hover:text-purple-600 font-semibold transition">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No staff members found.</td>
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
<<<<<<< HEAD
=======
=======
@section('title', 'Staff Members')

@section('content')
<h2 style="margin-bottom: 20px;">Staff Members</h2>

<a href="{{ route('admin.staffmembers.create') }}" style="background-color: #0d6efd; color: white; padding: 8px 15px; text-decoration: none; margin-bottom: 10px; display: inline-block;">+ Add Staff Member</a>

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #ccc; padding: 10px;">ID</th>
            <th style="border: 1px solid #ccc; padding: 10px;">Name</th>
            <th style="border: 1px solid #ccc; padding: 10px;">Address</th>
            <th style="border: 1px solid #ccc; padding: 10px;">Salary</th>
            <th style="border: 1px solid #ccc; padding: 10px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($staffmembers as $member)
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->Staffmember_ID }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->Name }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->Address }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->Salary }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">
                <a href="{{ route('admin.staffmembers.show', $member->Staffmember_ID) }}" style="background-color: #17a2b8; color: white; padding: 5px 10px; text-decoration: none;">View</a>
                <a href="{{ route('admin.staffmembers.edit', $member->Staffmember_ID) }}" style="background-color: #ffc107; color: black; padding: 5px 10px; text-decoration: none;">Edit</a>
                <form action="{{ route('admin.staffmembers.destroy', $member->Staffmember_ID) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this staff member?')" style="background-color: red; color: white; padding: 5px 10px; border: none;">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align: center;">No staff members found.</td></tr>
        @endforelse
    </tbody>
</table>
>>>>>>> eb2100bd96d0077ca1685dce352220888af84177
>>>>>>> 43e2df2a0413232a06535f2cd7a87dbc6265dce8
@endsection
