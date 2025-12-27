<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-zinc-50 text-zinc-900 overflow-x-hidden">

    <nav class="fixed w-full z-50 top-0 start-0 bg-white/70 backdrop-blur-lg border-b border-zinc-200/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-2">
                    <x-application-logo class="h-10 w-10 text-black fill-current" />
                    <span class="text-xl font-black tracking-tighter uppercase">Toko<span class="text-lime-500">Kita</span></span>
                </div>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-zinc-600 hover:text-black transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-bold text-zinc-600 hover:text-black transition px-4 py-2">Masuk</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-black text-white text-sm font-bold py-3 px-6 rounded-full hover:bg-zinc-800 hover:scale-105 transition transform shadow-lg shadow-black/20">
                                    Daftar Sekarang
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        
        <div class="absolute top-20 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-lime-400/20 rounded-full blur-[120px] -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-zinc-200 shadow-sm mb-8 animate-fade-in-up">
                <span class="w-2 h-2 rounded-full bg-lime-500 animate-pulse"></span>
                <span class="text-xs font-bold uppercase tracking-widest text-zinc-500">Sistem Inventaris v1.0</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-black text-black tracking-tighter uppercase leading-none mb-6">
                Kelola Stok <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-lime-500 to-green-600">Tanpa Pusing.</span>
            </h1>

            <p class="text-lg text-zinc-500 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
                Platform manajemen inventaris modern untuk bisnis yang ingin tumbuh cepat. Pantau barang, cek aset, dan kelola produk dalam satu dashboard yang estetik.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}" class="group bg-black text-white text-lg font-bold py-4 px-8 rounded-full hover:bg-zinc-800 transition shadow-xl hover:-translate-y-1 flex items-center gap-2">
                    Mulai Gratis
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
                <a href="#features" class="text-zinc-500 font-bold hover:text-black py-4 px-8 transition flex items-center gap-2">
                    Pelajari Fitur
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </a>
            </div>

        </div>

        <div class="mt-20 relative max-w-6xl mx-auto px-4 perspective-1000">
            <div class="bg-white rounded-[2rem] shadow-2xl border-4 border-zinc-100 p-4 transform rotate-x-12 scale-90 md:scale-100 hover:rotate-x-0 hover:scale-105 transition duration-700 ease-out origin-top">
                <div class="h-12 border-b border-zinc-100 flex items-center px-4 gap-2 mb-4">
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                </div>
                <div class="grid grid-cols-3 gap-4 h-[400px] overflow-hidden bg-zinc-50 rounded-xl p-6">
                    <div class="col-span-2 bg-white rounded-2xl shadow-sm h-full"></div>
                    <div class="col-span-1 bg-black rounded-2xl shadow-sm h-full relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-lime-500/20 rounded-full blur-xl"></div>
                    </div>
                </div>
            </div>
            
            <div class="absolute -bottom-10 left-1/2 -translate-x-1/2 w-3/4 h-20 bg-black/20 blur-[50px] rounded-full -z-10"></div>
        </div>
    </section>

    <section id="features" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-black tracking-tighter uppercase">Kenapa <span class="text-lime-500">Toko Kita?</span></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="bg-zinc-50 p-8 rounded-[2.5rem] hover:bg-white hover:shadow-xl hover:shadow-lime-500/10 border border-transparent hover:border-lime-200 transition duration-300 group">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black uppercase mb-3">Sangat Cepat</h3>
                    <p class="text-zinc-500 text-sm leading-relaxed">Dibangun dengan teknologi terbaru (Laravel + Tailwind) menjamin performa kilat tanpa loading lama.</p>
                </div>

                <div class="bg-black text-white p-8 rounded-[2.5rem] shadow-2xl relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-lime-500 rounded-full blur-[60px] opacity-20 group-hover:opacity-40 transition"></div>
                    
                    <div class="w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 relative z-10">
                        <svg class="w-7 h-7 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black uppercase mb-3 relative z-10">Analitik Pintar</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed relative z-10">Pantau pergerakan stok dan nilai aset Anda secara real-time dengan tampilan Bento Grid yang mudah dipahami.</p>
                </div>

                <div class="bg-zinc-50 p-8 rounded-[2.5rem] hover:bg-white hover:shadow-xl hover:shadow-lime-500/10 border border-transparent hover:border-lime-200 transition duration-300 group">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black uppercase mb-3">Aman & Terjamin</h3>
                    <p class="text-zinc-500 text-sm leading-relaxed">Data Anda disimpan dengan enkripsi tingkat tinggi. Kelola hak akses pengguna dengan mudah dan aman.</p>
                </div>

            </div>
        </div>
    </section>

    <footer class="bg-zinc-900 text-white py-12 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <x-application-logo class="h-8 w-8 text-white fill-current" />
                <span class="text-lg font-black tracking-tighter uppercase">Toko<span class="text-lime-500">Kita</span></span>
            </div>
            <p class="text-zinc-500 text-sm">&copy; {{ date('Y') }} SaaS Inventory System. All rights reserved.</p>
        </div>
    </footer>

    <style>
        .perspective-1000 { perspective: 1000px; }
        .rotate-x-12 { transform: rotateX(20deg); }
        .rotate-x-0 { transform: rotateX(0deg); }
        /* Smooth hover effect for the dashboard preview */
    </style>
</body>
</html>