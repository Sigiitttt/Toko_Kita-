<x-app-layout>
    <div class="py-12">
        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 space-y-10">
            
            <div class="px-4 sm:px-0">
                <h2 class="text-4xl font-black text-black tracking-tighter uppercase leading-none">
                    Pengaturan <span class="text-transparent bg-clip-text bg-gradient-to-r from-lime-500 to-green-600">Akun</span>
                </h2>
                <p class="text-zinc-500 text-sm mt-2 font-medium">Kelola informasi profil, keamanan, dan preferensi akun Anda.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 px-4 sm:px-0">

                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-zinc-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-lime-500/10 rounded-full blur-3xl -mr-10 -mt-10"></div>
                    
                    <div class="relative z-10">
                        <h3 class="text-lg font-black text-black mb-1 uppercase tracking-wide">Informasi Profil</h3>
                        <p class="text-xs text-zinc-400 mb-6">Perbarui nama akun dan alamat email Anda.</p>
                        
                        <div class="space-y-6">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-zinc-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-zinc-200/50 rounded-full blur-3xl -mr-10 -mt-10"></div>

                    <div class="relative z-10">
                        <h3 class="text-lg font-black text-black mb-1 uppercase tracking-wide">Keamanan</h3>
                        <p class="text-xs text-zinc-400 mb-6">Pastikan akun Anda aman dengan password yang kuat.</p>

                        <div class="space-y-6">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 bg-red-50/50 p-8 rounded-[2.5rem] border border-red-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-black text-red-600 mb-1 uppercase tracking-wide">Zona Bahaya</h3>
                        <p class="text-xs text-red-400">
                            Menghapus akun adalah tindakan permanen. Semua data, riwayat produk, dan informasi terkait akan dihapus selamanya.
                        </p>
                    </div>
                    
                    <div class="w-full md:w-auto bg-white/50 p-4 rounded-3xl border border-red-100">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>