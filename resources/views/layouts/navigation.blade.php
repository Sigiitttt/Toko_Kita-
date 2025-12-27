<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-xl border-b border-zinc-200/50 sticky top-0 z-50 transition-all duration-300">
    
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-black hover:text-lime-600 transition-colors duration-300" />
                    </a>
                </div>

                <div class="hidden space-x-10 sm:-my-px sm:ml-12 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <span class="text-[11px] font-black uppercase tracking-widest transition-colors duration-300 {{ request()->routeIs('dashboard') ? 'text-black' : 'text-zinc-400 hover:text-lime-600' }}">
                            {{ __('Dashboard') }}
                        </span>
                    </x-nav-link>
                    
                    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                        <span class="text-[11px] font-black uppercase tracking-widest transition-colors duration-300 {{ request()->routeIs('products.*') ? 'text-black' : 'text-zinc-400 hover:text-lime-600' }}">
                            {{ __('Katalog Produk') }}
                        </span>
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-zinc-200 rounded-full text-xs font-bold uppercase tracking-wide text-zinc-700 bg-white hover:border-lime-500 hover:text-black hover:shadow-lg hover:shadow-lime-500/10 transition-all duration-300 ease-in-out gap-3 group">
                            <div class="max-w-[100px] truncate group-hover:text-black">{{ Auth::user()->name }}</div>

                            <div class="bg-zinc-100 rounded-full p-1 group-hover:bg-lime-400 transition-colors">
                                <svg class="fill-current h-3 w-3 text-zinc-400 group-hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="group flex items-center gap-2 hover:bg-lime-50 hover:text-lime-700 transition-colors font-medium text-xs uppercase tracking-wide">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    class="group flex items-center gap-2 text-red-500 hover:bg-red-50 hover:text-red-700 transition-colors font-medium text-xs uppercase tracking-wide"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-zinc-400 hover:text-black hover:bg-zinc-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-zinc-100 bg-white/95 backdrop-blur-xl">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm font-black uppercase tracking-wide">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')" class="text-sm font-black uppercase tracking-wide">
                {{ __('Katalog Produk') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-zinc-100 bg-zinc-50/50">
            <div class="px-4">
                <div class="font-black text-base text-black uppercase tracking-wide">{{ Auth::user()->name }}</div>
                <div class="font-medium text-xs text-zinc-500 mt-1">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-zinc-600 hover:text-black">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="text-red-500 hover:bg-red-50 hover:text-red-700"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>