<x-app-layout>
    <div class="py-12">
        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8"> @if (session('success'))
            <div x-data="{ show: true }"
                x-show="show"
                x-transition.duration.300ms
                class="fixed top-5 right-5 z-50 flex items-center w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md border-l-4 border-green-500"
                role="alert">

                <div class="flex items-center justify-center w-12 bg-green-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"></path>
                    </svg>
                </div>

                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-green-500">Berhasil!</span>
                        <p class="text-sm text-gray-600">{{ session('success') }}</p>
                    </div>
                </div>

                <button @click="show = false" class="p-2 ml-auto bg-white border-none text-gray-500 hover:text-gray-900">
                    <span class="text-2xl">&times;</span>
                </button>
            </div>
            @endif

            <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-10 px-4 sm:px-0">
                <div>
                    <h2 class="text-4xl font-black text-black tracking-tighter uppercase leading-none">
                        Katalog <span class="text-transparent bg-clip-text bg-gradient-to-r from-lime-500 to-green-600">Produk</span>
                    </h2>
                    <p class="text-zinc-500 text-sm mt-2 font-medium">Kelola inventaris dan stok barang Anda.</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                    <form action="{{ route('products.index') }}" method="GET" class="relative w-full sm:w-72">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="block w-full pl-12 pr-4 py-3 border-zinc-200 rounded-full bg-zinc-50 text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-lime-400 focus:bg-white transition shadow-sm font-medium"
                            placeholder="Cari nama barang..."

                            {{-- 1. Inisialisasi AlpineJS --}}
                            x-data

                            {{-- 2. Tunggu 500ms setelah user stop ngetik, lalu submit form --}}
                            @input.debounce.500ms="$el.form.submit()"

                            {{-- 3. Fokus otomatis agar user tidak perlu klik lagi setelah reload --}}
                            autofocus

                            {{-- 4. Trik agar kursor ada di ujung teks (bukan di depan) saat reload --}}
                            onfocus="var val=this.value; this.value=''; this.value= val;" />
                    </form>

                    <a href="{{ route('products.create') }}" class="group bg-black hover:bg-zinc-800 text-white font-bold py-3 px-6 rounded-full shadow-lg transition transform hover:-translate-y-1 flex items-center justify-center gap-2 whitespace-nowrap">
                        <span class="text-lime-400 group-hover:rotate-90 transition transform duration-300 text-xl leading-none">+</span>
                        <span>Tambah Baru</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-4 sm:px-0">
                @forelse ($products as $product)

                <div class="group bg-white rounded-[2rem] border border-zinc-100 shadow-sm hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.1)] transition-all duration-300 overflow-hidden flex flex-col h-full hover:-translate-y-2">

                    <div class="relative w-full aspect-square bg-zinc-50 overflow-hidden">
                        @if ($product->foto && $product->foto !== 'noimage.png')
                        <img src="{{ asset('storage/products/'.$product->foto) }}"
                            alt="{{ $product->nama }}"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                        @else
                        <div class="flex flex-col items-center justify-center w-full h-full text-zinc-300 bg-zinc-50">
                            <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-xs font-bold uppercase tracking-widest">No Image</span>
                        </div>
                        @endif

                        <div class="absolute top-4 right-4 bg-black/80 backdrop-blur-md px-3 py-1.5 rounded-full shadow-xl border border-white/10">
                            <span class="text-lime-400 font-bold font-mono text-xs">
                                Rp {{ number_format((float) $product->harga, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <div class="p-5 flex-1 flex flex-col relative">
                        <div class="w-8 h-1 bg-lime-400 rounded-full mb-3"></div>

                        <h3 class="text-lg font-black text-black mb-2 leading-tight group-hover:text-lime-600 transition-colors line-clamp-1" title="{{ $product->nama }}">
                            {{ $product->nama }}
                        </h3>

                        <p class="text-zinc-500 text-xs mb-4 flex-1 line-clamp-2 leading-relaxed">
                            {{ $product->deskripsi }}
                        </p>

                        <a href="{{ route('products.edit', $product->id) }}" class="mt-auto w-full flex items-center justify-center gap-2 py-2.5 px-4 border border-zinc-200 rounded-xl text-xs font-bold text-zinc-600 hover:bg-black hover:text-white hover:border-black transition-all group/btn">
                            <span>Edit Detail</span>
                            <svg class="w-3 h-3 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                @empty

                <div class="col-span-1 sm:col-span-2 lg:col-span-3 xl:col-span-4 text-center py-24 bg-white rounded-[2.5rem] border border-dashed border-zinc-300">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-zinc-50 mb-6">
                        <svg class="w-10 h-10 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <h3 class="text-xl font-black text-zinc-900 mb-2">Tidak ada produk ditemukan.</h3>

                    @if(request('search'))
                    <p class="text-zinc-500 text-sm mb-6">
                        Kami tidak dapat menemukan barang dengan kata kunci "<span class="text-black font-bold">{{ request('search') }}</span>".
                    </p>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-lime-600 font-bold hover:underline">
                        <span>Reset Pencarian</span>
                    </a>
                    @else
                    <p class="text-zinc-500 text-sm mb-6">Inventaris Anda masih kosong. Mulai dengan menambahkan barang.</p>
                    <a href="{{ route('products.create') }}" class="inline-flex px-6 py-3 bg-black text-white rounded-full font-bold text-sm hover:bg-zinc-800 transition shadow-lg">
                        + Tambah Produk Pertama
                    </a>
                    @endif
                </div>
                @endforelse
            </div>

            <div class="mt-12 px-4 sm:px-0">
                {{ $products->links() }}
            </div>

            <footer class="mt-20 border-t border-zinc-200 py-8 text-center">
                <p class="text-sm font-bold text-zinc-900">&copy; 2023 Toko Kita.</p>
                <p class="text-xs text-zinc-400 mt-1 uppercase tracking-widest">SaaS Inventory System v1.0</p>
            </footer>

        </div>
    </div>
</x-app-layout>