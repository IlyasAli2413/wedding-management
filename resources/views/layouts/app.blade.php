<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Wedding Management') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen">
        @include('layouts.navigation')
        <main class="container mx-auto py-10 px-4 animate-fade-in">
            @yield('content')
        </main>
        <footer class="bg-white shadow-inner py-4 mt-10">
            <div class="container mx-auto text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} Wedding Management. All rights reserved.
            </div>
        </footer>
        <style>
        @keyframes fade-in {
          from { opacity: 0; }
          to { opacity: 1; }
        }
        .animate-fade-in {
          animation: fade-in 1s ease-in;
        }
        @keyframes bounce-slow {
          0%, 100% { transform: translateY(0); }
          50% { transform: translateY(-8px); }
        }
        .animate-bounce-slow {
          animation: bounce-slow 2s infinite;
        }
        </style>
    </body>
</html>
