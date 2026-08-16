<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PTSP MAN Keerom') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-nav { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(226, 232, 240, 0.8); }
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-800">

    <div class="min-h-screen">
        
        <!-- Premium Top Navigation -->
        <nav x-data="{ open: false }" class="fixed w-full z-50 glass-nav transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    
                    <!-- Branding -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center shadow text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path></svg>
                        </div>
                        <span class="font-bold text-lg tracking-tight text-slate-900 hidden sm:block">PTSP <span class="text-emerald-600">Keerom</span></span>
                    </div>

                    <!-- User Dropdown & Settings -->
                    <div class="flex items-center gap-4">
                        <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-100/50 border border-slate-200">
                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                            <span class="text-xs font-semibold text-slate-600 uppercase">{{ auth()->user()->role }}</span>
                        </div>

                        <!-- Dropdown -->
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center gap-2 hover:bg-slate-100 p-1 pr-3 rounded-full transition border border-transparent hover:border-slate-200 focus:outline-none">
                                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </div>
                                    <span class="text-sm font-medium text-slate-700 hidden sm:block">{{ auth()->user()->name }}</span>
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')" class="text-sm">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();" class="text-sm text-red-600 hover:text-red-700">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="pt-20 pb-12">
            {{ $slot }}
        </main>
        
    </div>
</body>
</html>
