<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PTSP MAN Keerom</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Inter', sans-serif; }
            .bg-glass {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }
        </style>
    </head>
    <body class="antialiased bg-gray-50 text-gray-800 selection:bg-green-500 selection:text-white">
        
        <!-- Navigation -->
        <nav class="fixed w-full z-50 transition-all duration-300 bg-glass border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-3">
                        <!-- School Logo Placeholder / Icon -->
                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-green-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                        </div>
                        <span class="font-bold text-xl tracking-tight text-gray-900">PTSP <span class="text-green-600">MAN Keerom</span></span>
                    </div>

                    @if (Route::has('login'))
                        <div class="hidden md:flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-green-600 transition">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-green-600 transition">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-green-600 text-white text-sm font-semibold px-5 py-2.5 rounded-full shadow-lg shadow-green-200 hover:bg-green-700 hover:-translate-y-0.5 transition transform">Daftar Sekarang</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="relative pt-24 pb-16 lg:pt-32 lg:pb-24 overflow-hidden min-h-screen flex items-center">
            
            <!-- Abstract Background Elements -->
            <div class="absolute inset-y-0 w-full h-full -z-10 bg-gradient-to-b from-green-50 to-white"></div>
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-green-200 opacity-20 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-blue-200 opacity-20 blur-3xl"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="text-center max-w-3xl mx-auto">
                    
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-700 font-medium text-sm mb-6 animate-fade-in-up">
                        <span class="flex h-2 w-2 rounded-full bg-green-500"></span>
                        Layanan Digital Administrasi
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 tracking-tight leading-tight mb-6">
                        Urus Administrasi Sekolah Lebih <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Mudah & Cepat</span>
                    </h1>
                    
                    <p class="mt-4 text-lg md:text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                        Selamat datang di Pelayanan Terpadu Satu Pintu (PTSP) MAN Keerom. Ajukan surat keterangan, legalisir, dan berbagai layanan lainnya langsung dari HP Anda.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row justify-center items-center gap-4 w-full px-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto px-8 py-4 rounded-full bg-green-600 text-white font-semibold shadow-xl shadow-green-200 hover:bg-green-700 hover:-translate-y-1 transition transform duration-200">
                                    Masuk ke Dashboard
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 rounded-full bg-green-600 text-white font-semibold shadow-xl shadow-green-200 hover:bg-green-700 hover:-translate-y-1 transition transform duration-200">
                                    Mulai Buat Permohonan
                                </a>
                                <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 rounded-full bg-white border border-gray-200 text-gray-700 font-semibold hover:bg-gray-50 hover:-translate-y-1 transition transform duration-200">
                                    Masuk
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>

                <!-- Feature Cards -->
                <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition duration-300">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Akses dari HP</h3>
                        <p class="text-gray-600 text-sm">Tidak perlu antre panjang, cukup gunakan smartphone Anda untuk mengurus semuanya.</p>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition duration-300">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Tanda Tangan Digital</h3>
                        <p class="text-gray-600 text-sm">Surat ditandatangani secara digital (BSrE) oleh Kepala Sekolah, aman dan sah.</p>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition duration-300">
                        <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Lacak Status</h3>
                        <p class="text-gray-600 text-sm">Pantau status permohonan Anda secara real-time dan terima notifikasi langsung.</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-100 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} MAN Keerom. All rights reserved.
            </div>
        </footer>
    </body>
</html>
