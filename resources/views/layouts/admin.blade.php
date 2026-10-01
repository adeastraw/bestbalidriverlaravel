<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — {{ setting('business_name', 'Best Bali Driver') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-sand-50 text-sand-900 font-sans antialiased min-h-screen relative selection:bg-emerald-500 selection:text-white"
      x-data="{ mobileSidebarOpen: false }"
      @keydown.window.escape="mobileSidebarOpen = false">

    <!-- Mobile Backdrop Overlay -->
    <div x-show="mobileSidebarOpen" 
         @click="mobileSidebarOpen = false" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/60 backdrop-blur-xs z-40 md:hidden" 
         x-cloak></div>

    <!-- Admin Sidebar (Fixed on Desktop, Off-Canvas Drawer on Mobile) -->
    <aside class="fixed inset-y-0 left-0 z-50 w-72 md:w-64 max-w-[85vw] h-screen overflow-y-auto bg-forest-950 text-cream-100 flex flex-col justify-between border-r border-forest-800 transform transition-transform duration-300 ease-in-out md:translate-x-0"
           :class="mobileSidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">
        <div>
            <!-- Header Brand -->
            <div class="p-5 sm:p-6 border-b border-forest-800/80 flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-emerald-600 flex items-center justify-center text-white font-bold shadow-sm">
                        B
                    </div>
                    <div>
                        <span class="font-display font-bold text-base block text-white leading-tight">Best Bali Driver</span>
                        <span class="text-[10px] tracking-widest text-emerald-300 uppercase block font-sans">CMS Portal</span>
                    </div>
                </a>

                <!-- Mobile Close Button -->
                <button type="button" @click="mobileSidebarOpen = false" 
                        class="md:hidden p-1.5 rounded-lg text-sand-400 hover:text-white hover:bg-forest-900 focus:outline-none transition-colors"
                        aria-label="Close Sidebar">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-forest-800 text-emerald-300 font-semibold shadow-inner' : 'text-cream-200 hover:bg-forest-900 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.trips.index') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.trips.*') ? 'bg-forest-800 text-emerald-300 font-semibold shadow-inner' : 'text-cream-200 hover:bg-forest-900 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    <span>Tours & Trips</span>
                </a>

                <a href="{{ route('admin.drivers.index') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.drivers.*') ? 'bg-forest-800 text-emerald-300 font-semibold shadow-inner' : 'text-cream-200 hover:bg-forest-900 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Drivers</span>
                </a>

                <a href="{{ route('admin.vehicles.index') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.vehicles.*') ? 'bg-forest-800 text-emerald-300 font-semibold shadow-inner' : 'text-cream-200 hover:bg-forest-900 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                    <span>Vehicle Fleet</span>
                </a>

                <a href="{{ route('admin.activities.index') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.activities.*') ? 'bg-forest-800 text-emerald-300 font-semibold shadow-inner' : 'text-cream-200 hover:bg-forest-900 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <span>Activities</span>
                </a>

                <a href="{{ route('admin.reviews.index') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.reviews.*') ? 'bg-forest-800 text-emerald-300 font-semibold shadow-inner' : 'text-cream-200 hover:bg-forest-900 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                    <span>Reviews</span>
                </a>

                <a href="{{ route('admin.settings.index') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-forest-800 text-emerald-300 font-semibold shadow-inner' : 'text-cream-200 hover:bg-forest-900 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Settings</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-forest-800/80 space-y-3">
            <a href="{{ route('home') }}" target="_blank" 
               class="flex items-center gap-2 text-xs text-sand-300 hover:text-white transition-colors px-2 py-1 rounded-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                <span>View Public Website</span>
            </a>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center justify-center gap-2 py-2 px-3 rounded-xl bg-rose-900/40 text-rose-300 hover:bg-rose-800/60 transition-colors text-xs font-semibold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span>Log Out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Admin Main Body (Offset by 64 on Desktop to accommodate fixed sidebar) -->
    <div class="md:pl-64 flex flex-col min-w-0 min-h-screen flex-1">
        <!-- Top Navbar -->
        <header class="bg-white/95 backdrop-blur-sm border-b border-sand-200 h-16 px-4 sm:px-6 flex items-center justify-between sticky top-0 z-20 shadow-xs">
            <div class="flex items-center gap-3">
                <!-- Hamburger Button (Mobile Only) -->
                <button type="button" @click="mobileSidebarOpen = !mobileSidebarOpen" 
                        class="md:hidden p-2 rounded-xl text-forest-900 hover:bg-sand-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-colors"
                        aria-label="Open Navigation Menu">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <h2 class="text-sm sm:text-base font-bold text-forest-900 truncate">
                    @yield('header_title', 'Management Dashboard')
                </h2>
            </div>

            <div class="flex items-center gap-2 sm:gap-3 text-xs text-sand-600">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <span class="hidden sm:inline">Logged in as <strong>{{ auth()->user()->name ?? 'Administrator' }}</strong></span>
                <span class="sm:hidden font-semibold text-forest-900">Admin</span>
            </div>
        </header>

        <!-- Flash alerts -->
        <div class="p-4 sm:p-6 pb-0">
            @if(session('success'))
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                    <button type="button" onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900 font-bold text-lg leading-none">×</button>
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm">
                    <strong class="block font-semibold mb-1">Please check the form for errors:</strong>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Content -->
        <main class="p-4 sm:p-6 flex-grow min-w-0">
            @yield('content')
        </main>
    </div>
</body>
</html>
