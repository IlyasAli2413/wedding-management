@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-gray-50 to-blue-100 py-12 px-4 sm:px-6 lg:px-8 animate-fade-in">
    <div class="w-full max-w-md space-y-8">
        <div class="flex flex-col items-center">
            <div class="mx-auto h-20 w-20 animate-bounce-slow">
                <x-application-logo class="w-full h-full" />
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Admin Portal Login</h2>
            <p class="mt-2 text-center text-sm text-gray-600">Administrator access only.</p>
        </div>
        <form class="mt-8 space-y-6 bg-white p-8 rounded-xl shadow-lg animate-slide-up" method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required autofocus
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-300 ease-in-out" />
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-300 ease-in-out" />
                </div>
            </div>
            @if ($errors->any())
                <div class="mb-4 text-red-600 animate-shake">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition duration-200" />
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500 transition duration-200">Forgot your password?</a>
                </div>
            </div>
            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-blue-500 to-gray-500 hover:from-gray-500 hover:to-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 shadow-lg transform transition duration-300 hover:scale-105 animate-pop">
                    Sign in
                </button>
            </div>
        </form>
        <div class="mt-6 text-center text-gray-600">
            <a href="{{ route('user.login') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-200">User Login</a>
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
@keyframes slide-up {
  from { transform: translateY(40px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}
.animate-slide-up {
  animation: slide-up 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}
@keyframes pop {
  0% { transform: scale(0.95); }
  60% { transform: scale(1.05); }
  100% { transform: scale(1); }
}
.animate-pop:active {
  animation: pop 0.2s;
}
@keyframes bounce-slow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-8px); }
}
.animate-bounce-slow {
  animation: bounce-slow 2s infinite;
}
@keyframes shake {
  0%, 100% { transform: translateX(0); }
  20%, 60% { transform: translateX(-8px); }
  40%, 80% { transform: translateX(8px); }
}
.animate-shake {
  animation: shake 0.4s;
}
</style>
@endsection 