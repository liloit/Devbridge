<x-app-layout>
    <div x-data="{ slideOpen: false, selectedTicket: null }" class="max-w-4xl mx-auto pb-24"> <!-- pb-24 for bottom bar space -->
        
        <div class="px-4 sm:px-6 lg:px-8 pt-6">
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Dokumen Masuk</h1>
            <p class="text-slate-500 mt-1 mb-8">Daftar permohonan yang menunggu tanda tangan (BSrE).</p>

            <!-- Minimalist List -->
            <div class="space-y-4">
                
                <!-- Item 1 -->
                <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm hover:shadow-md hover:border-emerald-200 transition-all group overflow-hidden">
                    <div class="flex items-center p-2 sm:p-4">
                        <label class="flex items-center justify-center p-3 cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-emerald-600 border-slate-300 rounded focus:ring-emerald-500">
                        </label>
                        <div class="flex-1 ml-2 py-2 cursor-pointer" @click="slideOpen = true; selectedTicket = 1">
                            <h3 class="font-bold text-slate-900 group-hover:text-emerald-700 transition">Siti Aisyah</h3>
                            <p class="text-sm text-slate-500">Surat Keterangan Aktif</p>
                        </div>
                        <button @click="slideOpen = true; selectedTicket = 1" class="px-4 text-emerald-600 font-semibold text-sm hover:text-emerald-700 transition flex items-center gap-1">
                            Lihat <span class="hidden sm:inline">Dokumen</span> &rarr;
                        </button>
                    </div>
                </div>
                
                <!-- Item 2 -->
                <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm hover:shadow-md hover:border-emerald-200 transition-all group overflow-hidden">
                    <div class="flex items-center p-2 sm:p-4">
                        <label class="flex items-center justify-center p-3 cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-emerald-600 border-slate-300 rounded focus:ring-emerald-500">
                        </label>
                        <div class="flex-1 ml-2 py-2 cursor-pointer" @click="slideOpen = true; selectedTicket = 2">
                            <h3 class="font-bold text-slate-900 group-hover:text-emerald-700 transition">Budi Santoso</h3>
                            <p class="text-sm text-slate-500">Legalisir Ijazah</p>
                        </div>
                        <button @click="slideOpen = true; selectedTicket = 2" class="px-4 text-emerald-600 font-semibold text-sm hover:text-emerald-700 transition flex items-center gap-1">
                            Lihat <span class="hidden sm:inline">Dokumen</span> &rarr;
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Sticky Bottom Action Bar -->
        <div class="fixed bottom-0 inset-x-0 p-4 sm:px-6 lg:px-8 bg-white/80 backdrop-blur-md border-t border-slate-200/60 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] z-40">
            <div class="max-w-4xl mx-auto flex items-center justify-between gap-4">
                <div class="hidden sm:block text-sm font-medium text-slate-600">
                    <span class="font-bold text-slate-900">0</span> dipilih
                </div>
                <button class="w-full sm:w-auto flex-1 sm:flex-none bg-emerald-600 text-white py-4 sm:py-3 px-8 rounded-xl font-bold shadow-[0_4px_14px_0_rgba(16,185,129,0.39)] hover:shadow-[0_6px_20px_rgba(16,185,129,0.23)] transition-all transform hover:-translate-y-0.5 active:scale-95">
                    Tanda Tangani Terpilih
                </button>
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
                        <h2 class="text-lg font-bold text-slate-900">Review Dokumen</h2>
                        <p class="text-xs text-slate-500 font-medium mt-0.5">Siti Aisyah - ID: #1028</p>
                    </div>
                    <button @click="slideOpen = false" class="p-2 bg-white border border-slate-200 hover:bg-slate-100 transition rounded-full text-slate-500 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                
                <!-- Body -->
                <div class="flex-1 overflow-y-auto p-6">
                    
                    <div class="mb-6">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Dokumen Draft (Menunggu TTD)</h4>
                        <div class="w-full h-80 bg-slate-100 rounded-xl border border-slate-200 flex flex-col items-center justify-center text-slate-400 relative overflow-hidden group">
                            <!-- Placeholder PDF -->
                            <svg class="w-12 h-12 mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span class="text-sm font-medium">Pratinjau Surat.pdf</span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Lampiran Verifikasi</h4>
                        <div class="flex items-center gap-3 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition">
                            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-slate-800">KTP_Siti_Aisyah.jpg</p>
                                <p class="text-xs text-slate-500">Telah diverifikasi oleh Admin TU</p>
                            </div>
                        </div>
                    </div>

                </div>
                
                <!-- Footer Actions -->
                <div class="p-6 border-t border-slate-100 bg-white flex flex-col gap-3">
                    <button class="w-full bg-emerald-600 text-white py-3 rounded-xl font-semibold hover:bg-emerald-700 transition shadow-sm shadow-emerald-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        Tanda Tangani Secara Digital
                    </button>
                    <button class="w-full bg-white border border-red-200 text-red-600 py-3 rounded-xl font-semibold hover:bg-red-50 transition shadow-sm">
                        Kembalikan ke TU
                    </button>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
