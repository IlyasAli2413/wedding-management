<nav x-data="{ open: false }" class="bg-gradient-to-r from-purple-600 to-blue-500 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <div class="flex items-center space-x-3">
                        <x-application-logo class="animate-bounce-slow" />
                        <span class="text-white text-2xl font-bold tracking-wide">Wedding Management</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if(Auth::user()->isAdmin())
                        <!-- Admin Navigation -->
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('Admin Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.*')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('All Orders') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.payments.index')" :active="request()->routeIs('admin.payments.*')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('All Payments') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.venues.index')" :active="request()->routeIs('admin.venues.*')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('Venues') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.staffmembers.index')" :active="request()->routeIs('admin.staffmembers.*')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('Staff') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.clients.index')" :active="request()->routeIs('admin.clients.*')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('Clients') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.menu-items.index')" :active="request()->routeIs('admin.menu-items.*')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('Menu Items') }}
                        </x-nav-link>
                    @else
                        <!-- User Navigation -->
                        <x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('user.orders.index')" :active="request()->routeIs('user.orders.*')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('My Orders') }}
                        </x-nav-link>
                        <x-nav-link :href="route('user.payments.index')" :active="request()->routeIs('user.payments.*')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('My Payments') }}
                        </x-nav-link>
                        <x-nav-link :href="route('user.venues.index')" :active="request()->routeIs('user.venues.*')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('Venues') }}
                        </x-nav-link>
                        <x-nav-link :href="route('user.menu-items.index')" :active="request()->routeIs('user.menu-items.*')" class="text-white hover:text-purple-200 transition font-semibold">
                            {{ __('Menu Items') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-purple-200 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }} ({{ Auth::user()->role }})</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        @if(Auth::user()->isAdmin())
                            <form method="POST" action="{{ route('admin.logout') }}">
                        @else
                            <form method="POST" action="{{ route('user.logout') }}">
                        @endif
                            @csrf

                            <button type="submit" class="w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-purple-200 focus:outline-none focus:text-purple-200 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::user()->isAdmin())
                <!-- Admin Navigation -->
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-white hover:text-purple-200">
                    {{ __('Admin Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.*')" class="text-white hover:text-purple-200">
                    {{ __('All Orders') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.payments.index')" :active="request()->routeIs('admin.payments.*')" class="text-white hover:text-purple-200">
                    {{ __('All Payments') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.venues.index')" :active="request()->routeIs('admin.venues.*')" class="text-white hover:text-purple-200">
                    {{ __('Venues') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.staffmembers.index')" :active="request()->routeIs('admin.staffmembers.*')" class="text-white hover:text-purple-200">
                    {{ __('Staff') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.clients.index')" :active="request()->routeIs('admin.clients.*')" class="text-white hover:text-purple-200">
                    {{ __('Clients') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.menu-items.index')" :active="request()->routeIs('admin.menu-items.*')" class="text-white hover:text-purple-200">
                    {{ __('Menu Items') }}
                </x-responsive-nav-link>
            @else
                <!-- User Navigation -->
                <x-responsive-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')" class="text-white hover:text-purple-200">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('user.orders.index')" :active="request()->routeIs('user.orders.*')" class="text-white hover:text-purple-200">
                    {{ __('My Orders') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('user.payments.index')" :active="request()->routeIs('user.payments.*')" class="text-white hover:text-purple-200">
                    {{ __('My Payments') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('user.venues.index')" :active="request()->routeIs('user.venues.*')" class="text-white hover:text-purple-200">
                    {{ __('Venues') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('user.menu-items.index')" :active="request()->routeIs('user.menu-items.*')" class="text-white hover:text-purple-200">
                    {{ __('Menu Items') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-purple-400">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }} ({{ Auth::user()->role }})</div>
                <div class="font-medium text-sm text-purple-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:text-purple-200">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                @if(Auth::user()->isAdmin())
                    <form method="POST" action="{{ route('admin.logout') }}">
                @else
                    <form method="POST" action="{{ route('user.logout') }}">
                @endif
                    @csrf

                    <button type="submit" class="w-full text-left px-4 py-2 text-sm leading-5 text-white hover:text-purple-200 focus:outline-none transition duration-150 ease-in-out">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
