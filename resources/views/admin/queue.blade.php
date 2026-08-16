<x-app-layout>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        
        <div class="mb-8 px-4 sm:px-0 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Antrean TU</h1>
                <p class="text-slate-500 mt-1">Kelola verifikasi permohonan surat dan legalisir.</p>
            </div>
            
            <!-- Filter/Search -->
            <div class="flex items-center gap-3 w-full md:w-auto">
                <div class="relative w-full md:w-64">
                    <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Cari pemohon..." class="w-full pl-10 pr-4 py-2 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition">
                </div>
                <button class="p-2.5 bg-white border border-slate-200 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-50 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                </button>
            </div>
        </div>

        <div x-data="{ slideOpen: false, selectedTicket: null }" class="px-4 sm:px-0">
            <!-- Card List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                
                <!-- Ticket 1: Safe -->
                <div @click="slideOpen = true; selectedTicket = 1" class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200/60 hover:shadow-md hover:border-emerald-200 transition-all cursor-pointer group flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aman
                            </span>
                            <span class="text-xs font-medium text-slate-400">#1030</span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-lg group-hover:text-emerald-700 transition">Legalisir Ijazah</h3>
                        <p class="text-sm text-slate-500 mt-1">Ahmad Khan</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400 font-medium">
                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 2 jam lalu</span>
                        <span class="text-slate-600 font-semibold group-hover:translate-x-1 transition transform">&rarr;</span>
                    </div>
                </div>
                
                <!-- Ticket 2: Overdue -->
                <div @click="slideOpen = true; selectedTicket = 2" class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200/60 hover:shadow-md hover:border-red-200 transition-all cursor-pointer group flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-2 h-full bg-red-500"></div> <!-- Urgent marker -->
                    <div>
                        <div class="flex justify-between items-start mb-4 pr-3">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-semibold bg-red-50 text-red-700 border border-red-100 animate-pulse">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Melewati SLA
                            </span>
                            <span class="text-xs font-medium text-slate-400">#1028</span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-lg group-hover:text-red-700 transition">Surat Keterangan</h3>
                        <p class="text-sm text-slate-500 mt-1">Siti Aisyah</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400 font-medium pr-3">
                        <span class="flex items-center gap-1 text-red-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 25 jam lalu</span>
                        <span class="text-slate-600 font-semibold group-hover:translate-x-1 transition transform">&rarr;</span>
                    </div>
                </div>

            </div>

            <!-- Slide-over / Bottom Sheet Details -->
            <div x-show="slideOpen" 
                 class="fixed inset-0 z-50 flex justify-end bg-slate-900/40 backdrop-blur-sm"
                 style="display: none;"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                
                <div class="w-full max-w-md h-full bg-white shadow-2xl flex flex-col transform transition-transform"
                     @click.away="slideOpen = false"
                     x-transition:enter="translate-y-full md:translate-y-0 md:translate-x-full"
                     x-transition:enter-start="translate-y-full md:translate-y-0 md:translate-x-full"
                     x-transition:enter-end="translate-y-0 md:translate-x-0"
                     x-transition:leave="translate-y-full md:translate-y-0 md:translate-x-full">
                     
                    <!-- Header -->
                    <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">Detail Permohonan</h2>
                            <p class="text-xs text-slate-500 font-medium mt-0.5">ID: #1028</p>
                        </div>
                        <button @click="slideOpen = false" class="p-2 bg-white border border-slate-200 hover:bg-slate-100 transition rounded-full text-slate-500 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    
                    <!-- Body -->
                    <div class="flex-1 overflow-y-auto p-6">
                        
                        <div class="mb-6">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Pemohon</h4>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-600">SA</div>
                                <div>
                                    <p class="font-bold text-slate-900">Siti Aisyah</p>
                                    <p class="text-sm text-slate-500">applicant@gmail.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Informasi Form</h4>
                            <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                                <div class="grid grid-cols-2 gap-y-4">
                                    <div>
                                        <p class="text-xs text-slate-500 mb-1">Jenis Layanan</p>
                                        <p class="text-sm font-semibold text-slate-800">Surat Keterangan</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-500 mb-1">Tanggal Pengajuan</p>
                                        <p class="text-sm font-semibold text-slate-800">15 Aug 2026</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Dokumen KTP</h4>
                            <div class="w-full h-48 bg-slate-100 rounded-xl border border-slate-200 flex flex-col items-center justify-center text-slate-400 relative overflow-hidden group cursor-pointer">
                                <!-- Placeholder Image/Icon -->
                                <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span class="text-sm font-medium">Lihat Dokumen</span>
                            </div>
                        </div>

                    </div>
                    
                    <!-- Footer Actions -->
                    <div class="p-6 border-t border-slate-100 bg-white flex gap-3">
                        <button class="flex-1 bg-white border border-red-200 text-red-600 py-3 rounded-xl font-semibold hover:bg-red-50 transition shadow-sm">Tolak</button>
                        <button class="flex-1 bg-emerald-600 text-white py-3 rounded-xl font-semibold hover:bg-emerald-700 transition shadow-sm shadow-emerald-200">Verifikasi</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
