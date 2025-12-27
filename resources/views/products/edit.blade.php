<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10 px-4 sm:px-0">
                <div>
                    <h2 class="text-4xl font-black text-black tracking-tighter uppercase leading-none">
                        Edit <span class="text-transparent bg-clip-text bg-gradient-to-r from-lime-500 to-green-600">Produk</span>
                    </h2>
                    <p class="text-zinc-500 text-sm mt-2 font-medium">Perbarui informasi detail dan stok barang.</p>
                </div>

                <a href="{{ route('products.index') }}" class="group flex items-center gap-2 px-5 py-2.5 rounded-full bg-white border border-zinc-200 text-sm font-bold text-zinc-600 hover:border-black hover:text-black transition-all shadow-sm">
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span>Kembali ke List</span>
                </a>
            </div>

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" 
                  x-data="{ photoName: null, photoPreview: null }">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 px-4 sm:px-0">

                    <div class="space-y-8">
                        
                        <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-zinc-100 relative overflow-hidden group hover:shadow-md transition duration-500">
                            
                            <div class="absolute -top-24 -right-24 w-64 h-64 bg-lime-50 rounded-full blur-3xl opacity-50 pointer-events-none"></div>

                            <div class="relative z-10">
                                <h3 class="text-lg font-bold text-black mb-8 flex items-center gap-3 border-b border-zinc-100 pb-4">
                                    <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-lime-100 text-lime-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </span>
                                    Detail Informasi
                                </h3>

                                <div class="space-y-6">
                                    <div>
                                        <x-input-label for="nama" :value="__('Nama Produk')" class="text-zinc-400 font-bold uppercase text-[10px] tracking-widest mb-1" />
                                        <input id="nama" class="block w-full border-zinc-200 rounded-xl px-4 py-3.5 bg-zinc-50 focus:bg-white focus:border-lime-500 focus:ring-lime-500 transition-all font-medium text-zinc-900 placeholder-zinc-400" 
                                               type="text" name="nama" 
                                               value="{{ old('nama', $product->nama) }}" 
                                               required autofocus />
                                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-input-label for="harga" :value="__('Harga Satuan (IDR)')" class="text-zinc-400 font-bold uppercase text-[10px] tracking-widest mb-1" />
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center font-bold text-zinc-400 select-none">Rp</span>
                                            <input id="harga" class="block w-full pl-12 border-zinc-200 rounded-xl px-4 py-3.5 bg-zinc-50 focus:bg-white focus:border-lime-500 focus:ring-lime-500 transition-all font-mono font-medium text-zinc-900 placeholder-zinc-400" 
                                                   type="text" name="harga" 
                                                   value="{{ old('harga', $product->harga) }}" 
                                                   required 
                                                   x-mask:dynamic="$money($input, '.')" />
                                        </div>
                                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-input-label for="deskripsi" :value="__('Deskripsi Detail')" class="text-zinc-400 font-bold uppercase text-[10px] tracking-widest mb-1" />
                                        <textarea id="deskripsi" name="deskripsi" rows="5" 
                                                  class="block w-full border-zinc-200 rounded-xl px-4 py-3.5 bg-zinc-50 focus:bg-white focus:border-lime-500 focus:ring-lime-500 transition-all leading-relaxed text-zinc-900 placeholder-zinc-400 resize-none" 
                                                  >{{ old('deskripsi', $product->deskripsi) }}</textarea>
                                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-red-50/50 p-8 rounded-[2.5rem] border border-red-100 flex flex-col sm:flex-row justify-between items-center gap-6">
                            <div>
                                <h3 class="text-lg font-bold text-red-600 mb-1">Hapus Produk</h3>
                                <p class="text-xs text-red-400 max-w-xs">Tindakan ini permanen. Data dan foto produk akan hilang selamanya.</p>
                            </div>
                            
                            <x-danger-button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion')"
                                class="w-full sm:w-auto justify-center py-3 px-6 rounded-xl uppercase tracking-widest text-[10px] font-black"
                            >{{ __('Hapus Permanen') }}</x-danger-button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-6">
                        
                        <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-zinc-100 flex flex-col h-full relative overflow-hidden group hover:shadow-md transition duration-500">
                            <h3 class="text-lg font-bold text-black mb-4 flex items-center gap-3 relative z-10">
                                <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-lime-100 text-lime-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </span>
                                Foto Produk
                            </h3>
                            
                            <div class="relative w-full flex-1 min-h-[350px] bg-zinc-50 border-2 border-dashed border-zinc-200 rounded-2xl flex items-center justify-center overflow-hidden hover:bg-white hover:border-lime-500 transition-all duration-300 group/upload cursor-pointer">
                                
                                <div x-show="!photoPreview && '{{ $product->foto }}' === 'noimage.png'" class="text-center p-6 transition-transform duration-300 group-hover/upload:scale-105">
                                    <div class="w-16 h-16 bg-white rounded-full shadow-sm border border-zinc-100 flex items-center justify-center mx-auto mb-4 group-hover/upload:shadow-md transition-all">
                                        <svg class="h-6 w-6 text-zinc-400 group-hover/upload:text-lime-500 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-bold text-zinc-900">Upload Gambar</p>
                                    <p class="text-[10px] uppercase tracking-wide text-zinc-400 mt-1 font-bold">JPG / PNG • Max 2MB</p>
                                </div>

                                <img x-show="!photoPreview && '{{ $product->foto }}' !== 'noimage.png'" 
                                     src="{{ asset('storage/products/'.$product->foto) }}" 
                                     class="object-cover w-full h-full absolute inset-0 transition group-hover/upload:opacity-50">

                                <div x-show="!photoPreview && '{{ $product->foto }}' !== 'noimage.png'" class="absolute inset-0 flex items-center justify-center opacity-0 group-hover/upload:opacity-100 transition-opacity">
                                    <span class="bg-black/70 text-white text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm">Ganti Foto</span>
                                </div>

                                <img x-show="photoPreview" :src="photoPreview" class="object-cover w-full h-full absolute inset-0" style="display: none;">
                                
                                <input type="file" name="foto" id="foto" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                       accept="image/*"
                                       x-on:change="
                                            const file = $event.target.files[0];
                                            const reader = new FileReader();
                                            reader.onload = (e) => { photoPreview = e.target.result; };
                                            reader.readAsDataURL(file);
                                       ">
                            </div>
                            <x-input-error :messages="$errors->get('foto')" class="mt-2 text-center text-xs" />
                        </div>

                        <button type="submit" class="w-full bg-lime-400 hover:bg-lime-500 text-black font-black py-4 px-6 rounded-2xl shadow-[0_8px_16px_-6px_rgba(163,230,53,0.4)] transition-all transform hover:-translate-y-1 hover:shadow-[0_12px_20px_-6px_rgba(163,230,53,0.6)] flex items-center justify-center gap-2 uppercase tracking-wide text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Simpan Perubahan</span>
                        </button>

                    </div>
                </div>
            </form>

            <x-modal name="confirm-product-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('products.destroy', $product->id) }}" class="p-6">
                    @csrf
                    @method('DELETE')

                    <h2 class="text-xl font-bold text-gray-900">
                        {{ __('Konfirmasi Hapus?') }}
                    </h2>

                    <p class="mt-2 text-sm text-gray-600">
                        {{ __('Apakah Anda yakin ingin menghapus produk ini? Setelah dihapus, data tidak dapat dikembalikan lagi.') }}
                    </p>

                    <div class="mt-6 flex justify-end gap-3">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Batal') }}
                        </x-secondary-button>

                        <x-danger-button>
                            {{ __('Ya, Hapus Produk') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>

        </div>
    </div>
</x-app-layout>