<x-app-layout>
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Welcome Header -->
        <div class="mb-8 px-4 sm:px-0 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Dashboard Pemohon</h1>
                <p class="text-slate-500 mt-1">Pantau status pengajuan dokumen Anda secara real-time.</p>
            </div>
            <a href="{{ route('tickets.create') }}" class="w-full md:w-auto inline-flex justify-center items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3.5 rounded-xl font-semibold shadow-[0_4px_14px_0_rgba(16,185,129,0.39)] hover:shadow-[0_6px_20px_rgba(16,185,129,0.23)] transition-all transform hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Buat Permohonan Baru
            </a>
        </div>

        <!-- Stats/Info Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 px-4 sm:px-0 mb-8">
            <div class="bg-white p-5 rounded-2xl border border-slate-200/60 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500">Total Pengajuan</p>
                    <p class="text-2xl font-bold text-slate-900">0</p>
                </div>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-slate-200/60 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500">Selesai</p>
                    <p class="text-2xl font-bold text-slate-900">0</p>
                </div>
            </div>
            <div class="bg-white p-5 rounded-2xl border border-slate-200/60 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500">Diproses</p>
                    <p class="text-2xl font-bold text-slate-900">0</p>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div class="px-4 sm:px-0">
            <div class="bg-white border border-slate-200/60 rounded-3xl p-12 text-center flex flex-col items-center shadow-sm">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-5 border border-slate-100">
                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Permohonan</h4>
                <p class="text-slate-500 max-w-sm mx-auto mb-6 leading-relaxed">Anda belum pernah mengajukan permohonan surat atau legalisir. Mulai ajukan sekarang untuk melihat statusnya di sini.</p>
                <a href="{{ route('tickets.create') }}" class="text-emerald-600 font-semibold hover:text-emerald-700 hover:underline inline-flex items-center gap-1">
                    Buat permohonan pertama Anda
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

    </div>
</x-app-layout>
