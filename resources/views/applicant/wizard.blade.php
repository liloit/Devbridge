<x-app-layout>
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        
        <div class="mb-8 px-4 sm:px-0">
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Buat Permohonan</h1>
            <p class="text-slate-500 mt-1">Lengkapi form di bawah ini untuk mengajukan layanan dokumen.</p>
        </div>
        
        <div x-data="wizardForm()" class="px-4 sm:px-0">
            <div class="bg-white rounded-3xl shadow-sm border border-slate-200/60 overflow-hidden">
                
                <!-- Step Indicators -->
                <div class="flex items-center justify-between px-8 py-5 border-b border-slate-100 bg-slate-50/50">
                    <div class="flex items-center gap-2">
                        <div :class="{'bg-emerald-600 text-white': step >= 1, 'bg-slate-200 text-slate-500': step < 1}" class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm transition-colors">1</div>
                        <span :class="{'text-emerald-700 font-bold': step >= 1, 'text-slate-500 font-medium': step < 1}" class="text-sm hidden sm:block">Jenis</span>
                    </div>
                    <div class="flex-1 border-t-2 border-dashed mx-4" :class="{'border-emerald-300': step >= 2, 'border-slate-200': step < 2}"></div>
                    <div class="flex items-center gap-2">
                        <div :class="{'bg-emerald-600 text-white': step >= 2, 'bg-slate-200 text-slate-500': step < 2}" class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm transition-colors">2</div>
                        <span :class="{'text-emerald-700 font-bold': step >= 2, 'text-slate-500 font-medium': step < 2}" class="text-sm hidden sm:block">Unggah</span>
                    </div>
                    <div class="flex-1 border-t-2 border-dashed mx-4" :class="{'border-emerald-300': step >= 3, 'border-slate-200': step < 3}"></div>
                    <div class="flex items-center gap-2">
                        <div :class="{'bg-emerald-600 text-white': step >= 3, 'bg-slate-200 text-slate-500': step < 3}" class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm transition-colors">3</div>
                        <span :class="{'text-emerald-700 font-bold': step >= 3, 'text-slate-500 font-medium': step < 3}" class="text-sm hidden sm:block">Review</span>
                    </div>
                </div>

                <form action="/tickets/submit" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    
                    <!-- Step 1: Choose Type -->
                    <div x-show="step === 1" x-transition.opacity.duration.300ms>
                        <h2 class="text-xl font-bold text-slate-800 mb-6">Pilih Layanan</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                            <label class="relative flex flex-col p-5 border-2 rounded-2xl cursor-pointer hover:bg-slate-50 transition"
                                   :class="selectedType === 'letter' ? 'border-emerald-500 bg-emerald-50/30' : 'border-slate-200'">
                                <input type="radio" name="type" value="letter" x-model="selectedType" class="sr-only">
                                <svg class="w-8 h-8 mb-3" :class="selectedType === 'letter' ? 'text-emerald-600' : 'text-slate-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <span class="font-bold text-slate-900">Surat Keterangan</span>
                                <span class="text-xs text-slate-500 mt-1">Surat aktif belajar, surat pindah, dll.</span>
                            </label>
                            <label class="relative flex flex-col p-5 border-2 rounded-2xl cursor-pointer hover:bg-slate-50 transition"
                                   :class="selectedType === 'legalization' ? 'border-emerald-500 bg-emerald-50/30' : 'border-slate-200'">
                                <input type="radio" name="type" value="legalization" x-model="selectedType" class="sr-only">
                                <svg class="w-8 h-8 mb-3" :class="selectedType === 'legalization' ? 'text-emerald-600' : 'text-slate-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                                <span class="font-bold text-slate-900">Legalisir</span>
                                <span class="text-xs text-slate-500 mt-1">Legalisir Ijazah, Raport, dll.</span>
                            </label>
                        </div>
                        <div class="flex justify-end">
                            <button @click.prevent="if(selectedType) step = 2" class="bg-emerald-600 text-white px-8 py-3.5 rounded-xl font-bold hover:bg-emerald-700 transition shadow-[0_4px_14px_0_rgba(16,185,129,0.39)] hover:-translate-y-0.5" :disabled="!selectedType" :class="{'opacity-50 cursor-not-allowed': !selectedType}">Lanjut ke Tahap 2 &rarr;</button>
                        </div>
                    </div>

                    <!-- Step 2: Form & Upload -->
                    <div x-show="step === 2" x-transition.opacity.duration.300ms style="display: none;">
                        <h2 class="text-xl font-bold text-slate-800 mb-6">Unggah Persyaratan</h2>
                        
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Pindai / Foto KTP Anda <span class="text-red-500">*</span></label>
                            <div class="relative w-full h-56 border-2 border-dashed border-slate-300 rounded-2xl flex flex-col items-center justify-center bg-slate-50 hover:bg-slate-100 hover:border-emerald-400 transition cursor-pointer overflow-hidden group">
                                <input type="file" @change="previewImage" name="ktp" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" required>
                                
                                <template x-if="!imageUrl">
                                    <div class="text-center p-6">
                                        <div class="w-14 h-14 bg-white rounded-full shadow flex items-center justify-center mx-auto mb-3 text-emerald-600 group-hover:scale-110 transition-transform">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                        </div>
                                        <p class="font-bold text-slate-700">Tap untuk memilih foto</p>
                                        <p class="text-xs text-slate-500 mt-1">Format: JPG, PNG. Maksimal 5MB.</p>
                                    </div>
                                </template>

                                <template x-if="imageUrl">
                                    <div class="absolute inset-0 w-full h-full">
                                        <img :src="imageUrl" class="w-full h-full object-cover" />
                                        <div class="absolute inset-0 bg-slate-900/50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                            <span class="text-white font-semibold bg-slate-900/50 px-4 py-2 rounded-full backdrop-blur-sm">Ganti Foto</span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-8">
                            <button @click.prevent="step = 1" class="w-1/3 bg-white border border-slate-200 text-slate-700 px-6 py-3.5 rounded-xl font-bold hover:bg-slate-50 transition">Kembali</button>
                            <button @click.prevent="if(imageUrl) step = 3" class="w-2/3 bg-emerald-600 text-white px-6 py-3.5 rounded-xl font-bold hover:bg-emerald-700 transition shadow-[0_4px_14px_0_rgba(16,185,129,0.39)] hover:-translate-y-0.5" :disabled="!imageUrl" :class="{'opacity-50 cursor-not-allowed': !imageUrl}">Cek Ringkasan &rarr;</button>
                        </div>
                    </div>

                    <!-- Step 3: Review -->
                    <div x-show="step === 3" x-transition.opacity.duration.300ms style="display: none;">
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h2 class="text-2xl font-bold text-slate-800">Review Pengajuan</h2>
                            <p class="text-slate-500 mt-2">Pastikan semua data sudah benar sebelum dikirimkan ke pihak Tata Usaha.</p>
                        </div>
                        
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 mb-8">
                            <div class="flex justify-between items-center mb-4 pb-4 border-b border-slate-200">
                                <span class="text-slate-500 font-medium text-sm">Jenis Layanan</span>
                                <span class="font-bold text-slate-900" x-text="selectedType === 'letter' ? 'Surat Keterangan' : 'Legalisir'"></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-500 font-medium text-sm">Dokumen Terlampir</span>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                                    1 File KTP
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex gap-3">
                            <button @click.prevent="step = 2" class="w-1/3 bg-white border border-slate-200 text-slate-700 px-6 py-3.5 rounded-xl font-bold hover:bg-slate-50 transition">Kembali</button>
                            <button type="submit" class="w-2/3 bg-emerald-600 text-white px-6 py-3.5 rounded-xl font-bold hover:bg-emerald-700 transition shadow-[0_4px_14px_0_rgba(16,185,129,0.39)] hover:-translate-y-0.5">Kirim Permohonan Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
            function wizardForm() {
                return {
                    step: 1,
                    selectedType: null,
                    imageUrl: null,
                    previewImage(event) {
                        const file = event.target.files[0];
                        if (file) {
                            this.imageUrl = URL.createObjectURL(file);
                        }
                    }
                }
            }
            </script>
            
        </div>
    </div>
</x-app-layout>
