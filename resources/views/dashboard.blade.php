<x-app-layout>
    <div class="py-12">
        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 space-y-10">

            <div class="px-4 sm:px-0">
                <h2 class="text-4xl font-black text-black tracking-tighter uppercase leading-none">
                    Dashboard <span class="text-transparent bg-clip-text bg-gradient-to-r from-lime-500 to-green-600">Utama</span>
                </h2>
                <p class="text-zinc-500 text-sm mt-2 font-medium">Ringkasan aktivitas dan performa toko Anda hari ini.</p>
            </div>

            <div class="bg-black rounded-[2.5rem] p-8 sm:p-12 text-white relative overflow-hidden shadow-2xl group mx-4 sm:mx-0">
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-80 h-80 bg-lime-500 rounded-full opacity-20 blur-[100px] group-hover:opacity-30 transition duration-1000"></div>
                <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-green-500 rounded-full opacity-20 blur-[80px]"></div>

                <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/10 text-xs font-bold uppercase tracking-widest text-lime-400 mb-4 backdrop-blur-md">
                            <span class="w-2 h-2 rounded-full bg-lime-400 animate-pulse"></span>
                            Status: Online
                        </div>
                        <h2 class="text-4xl font-black tracking-tight mb-2">Halo, {{ Auth::user()->name }}! 👋</h2>
                        <p class="text-zinc-400 max-w-lg leading-relaxed">Kelola produk, pantau stok, dan lihat perkembangan bisnismu dalam satu tampilan yang terintegrasi.</p>
                    </div>

                    <a href="{{ route('products.create') }}" class="group/btn bg-lime-400 hover:bg-lime-500 text-black font-black py-4 px-8 rounded-full transition transform hover:scale-105 shadow-[0_0_40px_-10px_rgba(163,230,53,0.6)] flex items-center gap-3">
                        <span class="bg-black text-lime-400 rounded-full w-6 h-6 flex items-center justify-center text-lg leading-none group-hover/btn:rotate-90 transition duration-300">+</span>
                        <span>Tambah Produk</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4 sm:px-0">

                <div class="bg-white p-8 rounded-[2.5rem] border border-zinc-100 shadow-sm hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.1)] transition-all duration-300 hover:-translate-y-2 group">
                    <div class="flex items-center justify-between mb-6">
                        <div class="bg-zinc-50 p-4 rounded-2xl group-hover:bg-black transition-colors duration-300">
                            <svg class="w-6 h-6 text-black group-hover:text-lime-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-green-600 bg-green-50 border border-green-100 px-3 py-1 rounded-full flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            +2.5%
                        </span>
                    </div>
                    <h3 class="text-zinc-400 text-xs font-bold uppercase tracking-widest">Total Produk</h3>
                    <p class="text-4xl font-black text-black mt-2">{{ $totalProducts }} <span class="text-lg text-zinc-400 font-medium">Unit</span></p>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-zinc-100 shadow-sm hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.1)] transition-all duration-300 hover:-translate-y-2 group">
                    <div class="flex items-center justify-between mb-6">
                        <div class="bg-zinc-50 p-4 rounded-2xl group-hover:bg-black transition-colors duration-300">
                            <svg class="w-6 h-6 text-black group-hover:text-lime-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-lime-600 bg-lime-50 border border-lime-100 px-3 py-1 rounded-full">Aktif</span>
                    </div>
                    <h3 class="text-zinc-400 text-xs font-bold uppercase tracking-widest">Estimasi Aset</h3>
                    <p class="text-3xl font-black text-black mt-2 tracking-tight">Rp {{ number_format($totalValue, 0, ',', '.') }}</p>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-zinc-100 shadow-sm hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.1)] transition-all duration-300 hover:-translate-y-2 group">
                    <div class="flex items-center justify-between mb-6">
                        <div class="bg-zinc-50 p-4 rounded-2xl group-hover:bg-black transition-colors duration-300">
                            <svg class="w-6 h-6 text-black group-hover:text-lime-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-zinc-500 bg-zinc-100 border border-zinc-200 px-3 py-1 rounded-full">30 Hari</span>
                    </div>
                    <h3 class="text-zinc-400 text-xs font-bold uppercase tracking-widest">Kesehatan Toko</h3>
                    <p class="text-3xl font-black text-lime-600 mt-2">Sangat Baik</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 px-4 sm:px-0">

                <div class="lg:col-span-2 bg-white rounded-[2.5rem] border border-zinc-100 shadow-sm p-8 overflow-hidden">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                        <div>
                            <h3 class="text-xl font-black text-black">Baru Ditambahkan</h3>
                            <p class="text-zinc-400 text-xs mt-1">5 barang terakhir yang masuk inventaris.</p>
                        </div>
                        <a href="{{ route('products.index') }}" class="group flex items-center gap-2 text-sm font-bold text-black border-b-2 border-transparent hover:border-lime-400 transition-all">
                            Lihat Semua
                            <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-zinc-500">
                            <thead class="bg-zinc-50/50 text-zinc-900 font-bold uppercase text-[10px] tracking-widest">
                                <tr>
                                    <th class="px-6 py-4 rounded-l-xl">Nama Produk</th>
                                    <th class="px-6 py-4">Harga</th>
                                    <th class="px-6 py-4 rounded-r-xl">Tanggal Input</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-50">
                                @forelse($latestProducts as $product)
                                <tr class="hover:bg-zinc-50 transition duration-200 group">
                                    <td class="px-6 py-4 font-bold text-black flex items-center gap-4">
                                        <div class="h-12 w-12 rounded-xl bg-zinc-100 flex-shrink-0 overflow-hidden border border-zinc-100 group-hover:border-lime-400 transition-colors">
                                            @if($product->foto && $product->foto !== 'noimage.png')
                                            <img src="{{ asset('storage/products/'.$product->foto) }}" class="h-full w-full object-cover">
                                            @else
                                            <div class="h-full w-full flex items-center justify-center text-zinc-300">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            @endif
                                        </div>
                                        {{ $product->nama }}
                                    </td>
                                    <td class="px-6 py-4 font-mono font-medium text-zinc-600">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-zinc-400">{{ $product->created_at->diffForHumans() }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-zinc-400">
                                        Belum ada produk yang ditambahkan.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-black text-white rounded-[2.5rem] p-8 relative overflow-hidden flex flex-col justify-between h-full min-h-[400px]">

                    <div class="absolute top-0 right-0 w-48 h-48 bg-lime-500 rounded-full opacity-20 blur-[60px] transform translate-x-10 -translate-y-10"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-green-500 rounded-full opacity-20 blur-[50px]"></div>

                    <div class="relative z-10">
                        <div class="w-12 h-12 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black mb-2">Laporan & Ekspor</h3>
                        <p class="text-zinc-400 text-sm leading-relaxed">Unduh rekapitulasi data stok barang dalam format Excel/PDF untuk keperluan administrasi bulanan.</p>
                    </div>

                    <div class="relative z-10 space-y-6 mt-8">
                        <button class="w-full bg-white hover:bg-zinc-200 text-black font-black py-4 rounded-xl transition shadow-lg flex items-center justify-center gap-2 group">
                            <svg class="w-5 h-5 text-black group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Download Data Stok
                        </button>

                        <div class="border-t border-white/10 pt-6">
                            <p class="text-[10px] text-zinc-500 uppercase font-bold tracking-widest mb-3">Utilitas Admin</p>
                            <ul class="space-y-3 text-sm font-medium text-zinc-300">
                                <li>
                                    <a href="#" class="hover:text-lime-400 transition flex items-center gap-2 group">
                                        <span class="w-1.5 h-1.5 rounded-full bg-zinc-600 group-hover:bg-lime-400 transition"></span>
                                        Cetak Label / Barcode
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="hover:text-lime-400 transition flex items-center gap-2 group">
                                        <span class="w-1.5 h-1.5 rounded-full bg-zinc-600 group-hover:bg-lime-400 transition"></span>
                                        Riwayat Stok Masuk/Keluar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>