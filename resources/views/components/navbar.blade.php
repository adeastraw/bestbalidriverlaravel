<header x-data="{ mobileMenuOpen: false, scrolled: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 20)" 
        class="sticky top-0 z-50 transition-all duration-300 bg-forest-900/95 backdrop-blur-md text-cream-100 border-b border-forest-800/80 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-full bg-tropical-green flex items-center justify-center text-cream-100 shadow-inner group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <span class="font-display text-xl font-bold tracking-wide text-cream-100 block group-hover:text-emerald-300 transition-colors">
                        Best Bali Driver
                    </span>
                    <span class="text-[10px] tracking-widest text-emerald-200/80 uppercase block font-sans -mt-0.5">
                        Private Driver & Travel
                    </span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden lg:flex items-center space-x-1 font-medium text-sm">
                <a href="{{ route('home') }}" 
                   class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('home') ? 'text-emerald-300 font-semibold bg-forest-800' : 'text-cream-200 hover:text-white hover:bg-forest-800/50' }}">
                   Home
                </a>
                <a href="{{ route('about') }}" 
                   class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('about') ? 'text-emerald-300 font-semibold bg-forest-800' : 'text-cream-200 hover:text-white hover:bg-forest-800/50' }}">
                   About
                </a>
                <a href="{{ route('drivers.index') }}" 
                   class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('drivers.*') ? 'text-emerald-300 font-semibold bg-forest-800' : 'text-cream-200 hover:text-white hover:bg-forest-800/50' }}">
                   Driver
                </a>
                <a href="{{ route('vehicles.index') }}" 
                   class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('vehicles.*') ? 'text-emerald-300 font-semibold bg-forest-800' : 'text-cream-200 hover:text-white hover:bg-forest-800/50' }}">
                   Vehicles
                </a>
                <a href="{{ route('trips.index') }}" 
                   class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('trips.*') ? 'text-emerald-300 font-semibold bg-forest-800' : 'text-cream-200 hover:text-white hover:bg-forest-800/50' }}">
                   Trips
                </a>
                <a href="{{ route('activities.index') }}" 
                   class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('activities.*') ? 'text-emerald-300 font-semibold bg-forest-800' : 'text-cream-200 hover:text-white hover:bg-forest-800/50' }}">
                   Activities
                </a>
                <a href="{{ route('reviews.index') }}" 
                   class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('reviews.*') ? 'text-emerald-300 font-semibold bg-forest-800' : 'text-cream-200 hover:text-white hover:bg-forest-800/50' }}">
                   Reviews
                </a>
                <a href="{{ route('contact') }}" 
                   class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('contact') ? 'text-emerald-300 font-semibold bg-forest-800' : 'text-cream-200 hover:text-white hover:bg-forest-800/50' }}">
                   Contact
                </a>
            </nav>

            <!-- Desktop WhatsApp CTA Button -->
            <div class="hidden lg:flex items-center gap-3">
                <a href="{{ whatsapp_url() }}" target="_blank" rel="noopener noreferrer" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-sm shadow-lg shadow-emerald-900/30 hover:shadow-emerald-700/40 transition-all transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                    </svg>
                    <span>Book via WhatsApp</span>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex items-center lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        type="button" 
                        class="p-2 rounded-lg text-cream-100 hover:bg-forest-800 focus:outline-none focus:ring-2 focus:ring-emerald-400"
                        aria-label="Toggle Navigation Menu">
                    <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div x-show="mobileMenuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden bg-forest-950/95 border-b border-forest-800 px-4 pt-3 pb-6 space-y-2">
        <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg text-base {{ request()->routeIs('home') ? 'bg-forest-800 text-emerald-300 font-semibold' : 'text-cream-200 hover:bg-forest-800/60' }}">
            Home
        </a>
        <a href="{{ route('about') }}" class="block px-3 py-2.5 rounded-lg text-base {{ request()->routeIs('about') ? 'bg-forest-800 text-emerald-300 font-semibold' : 'text-cream-200 hover:bg-forest-800/60' }}">
            About
        </a>
        <a href="{{ route('drivers.index') }}" class="block px-3 py-2.5 rounded-lg text-base {{ request()->routeIs('drivers.*') ? 'bg-forest-800 text-emerald-300 font-semibold' : 'text-cream-200 hover:bg-forest-800/60' }}">
            Driver
        </a>
        <a href="{{ route('vehicles.index') }}" class="block px-3 py-2.5 rounded-lg text-base {{ request()->routeIs('vehicles.*') ? 'bg-forest-800 text-emerald-300 font-semibold' : 'text-cream-200 hover:bg-forest-800/60' }}">
            Vehicles
        </a>
        <a href="{{ route('trips.index') }}" class="block px-3 py-2.5 rounded-lg text-base {{ request()->routeIs('trips.*') ? 'bg-forest-800 text-emerald-300 font-semibold' : 'text-cream-200 hover:bg-forest-800/60' }}">
            Trips
        </a>
        <a href="{{ route('activities.index') }}" class="block px-3 py-2.5 rounded-lg text-base {{ request()->routeIs('activities.*') ? 'bg-forest-800 text-emerald-300 font-semibold' : 'text-cream-200 hover:bg-forest-800/60' }}">
            Activities
        </a>
        <a href="{{ route('reviews.index') }}" class="block px-3 py-2.5 rounded-lg text-base {{ request()->routeIs('reviews.*') ? 'bg-forest-800 text-emerald-300 font-semibold' : 'text-cream-200 hover:bg-forest-800/60' }}">
            Reviews
        </a>
        <a href="{{ route('contact') }}" class="block px-3 py-2.5 rounded-lg text-base {{ request()->routeIs('contact') ? 'bg-forest-800 text-emerald-300 font-semibold' : 'text-cream-200 hover:bg-forest-800/60' }}">
            Contact
        </a>

        <div class="pt-3">
            <a href="{{ whatsapp_url() }}" target="_blank" rel="noopener noreferrer"
               class="w-full flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-base shadow-md">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                </svg>
                <span>Book via WhatsApp</span>
            </a>
        </div>
    </div>
</header>
