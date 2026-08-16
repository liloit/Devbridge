<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - PTSP MAN Keerom</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="antialiased bg-slate-50 text-slate-800">

    <div class="min-h-screen flex">
        
        <!-- Left Side (Visual / Branding) -->
        <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-emerald-600 to-teal-800 relative items-center justify-center overflow-hidden">
            <!-- Decorative circles -->
            <div class="absolute top-0 left-0 w-96 h-96 bg-white opacity-5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-300 opacity-20 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>
            
            <div class="relative z-10 text-center px-12">
                <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-2xl mx-auto flex items-center justify-center mb-8 shadow-xl border border-white/20">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                </div>
                <h1 class="text-4xl font-bold text-white tracking-tight mb-4">Portal Pelayanan Terpadu</h1>
                <p class="text-emerald-100 text-lg leading-relaxed max-w-md mx-auto">
                    Kemudahan mengurus administrasi dan legalisir dokumen MAN Keerom secara digital.
                </p>
            </div>
        </div>

        <!-- Right Side (Form) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
            <div class="w-full max-w-md">
                
                <!-- Mobile Logo -->
                <div class="lg:hidden flex items-center gap-3 mb-10">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path></svg>
                    </div>
                    <span class="font-bold text-2xl tracking-tight text-slate-900">PTSP</span>
                </div>

                <div class="mb-10">
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Selamat Datang Kembali</h2>
                    <p class="text-slate-500 mt-2">Silakan masuk menggunakan email Anda.</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition shadow-sm placeholder:text-slate-400 text-slate-900" placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-700">Lupa password?</a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password" 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition shadow-sm text-slate-900" placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="w-5 h-5 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 transition">
                        <label for="remember_me" class="ml-3 text-sm text-slate-600">Ingat saya di perangkat ini</label>
                    </div>

                    <button type="submit" class="w-full bg-emerald-600 text-white font-semibold py-3.5 rounded-xl shadow-[0_4px_14px_0_rgba(16,185,129,0.39)] hover:shadow-[0_6px_20px_rgba(16,185,129,0.23)] hover:-translate-y-0.5 transition-all duration-200">
                        Masuk Sekarang
                    </button>
                    
                    @if (Route::has('register'))
                    <p class="text-center text-slate-600 text-sm mt-6">
                        Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-emerald-600 hover:text-emerald-700">Daftar disini</a>
                    </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>
</html>
