<div x-data="{ 
        dismissed: (function() {
            try { return sessionStorage.getItem('bbd_notice_dismissed') === '1'; }
            catch(e) { return false; }
        })(),
        dismiss() {
            this.dismissed = true;
            try { sessionStorage.setItem('bbd_notice_dismissed', '1'); }
            catch(e) {}
        }
     }"
     x-show="!dismissed"
     x-cloak
     x-transition:leave="transition-all ease-in-out duration-300 transform"
     x-transition:leave-start="opacity-100 max-h-48"
     x-transition:leave-end="opacity-0 max-h-0 -translate-y-2"
     class="relative z-40 bg-gradient-to-r from-forest-950 via-forest-900 to-forest-950 text-cream-100 border-b border-forest-800/70 shadow-sm overflow-hidden"
     role="region"
     aria-label="Website Status Notice">

    <!-- Ambient Subtle Background Glow -->
    <div class="pointer-events-none absolute -top-12 left-1/4 w-72 h-24 bg-emerald-500/10 rounded-full blur-2xl"></div>
    <div class="pointer-events-none absolute -bottom-10 right-1/4 w-72 h-20 bg-sand-500/10 rounded-full blur-2xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-3.5">
        <div class="flex items-start sm:items-center justify-between gap-3 sm:gap-6">
            
            <!-- Left: Accent Icon & Content -->
            <div class="flex items-start gap-3 sm:gap-3.5 flex-grow">
                <!-- Bali Lotus / Compass Minimal Monogram -->
                <div class="flex-shrink-0 mt-0.5 sm:mt-0 w-8 h-8 rounded-full bg-forest-800/90 border border-emerald-400/25 flex items-center justify-center text-emerald-300 shadow-inner">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" 
                              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>
                </div>

                <!-- Text Hierarchy -->
                <div class="flex-grow space-y-1 sm:space-y-0.5">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-emerald-950/80 border border-emerald-500/30 text-[10px] font-semibold uppercase tracking-widest text-emerald-300">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>Service Update</span>
                        </span>
                        <h2 class="font-display text-xs sm:text-sm font-bold text-cream-50 tracking-tight">
                            A Little Update From Our Team
                        </h2>
                    </div>

                    <p class="text-xs sm:text-[13px] text-sand-200/90 leading-relaxed font-light">
                        We're currently fine-tuning our website and service arrangements to provide you with a better Bali travel experience. 
                        Some booking features may not be available yet. Thank you for your patience and understanding.
                        <a href="{{ route('contact') }}" 
                           class="inline-flex items-center gap-1 text-emerald-300 hover:text-emerald-200 font-medium underline underline-offset-2 ml-1 transition-colors">
                            <span>General inquiries welcome</span>
                            <svg class="w-3 h-3 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </p>
                </div>
            </div>

            <!-- Right: Dismiss Button -->
            <div class="flex-shrink-0 flex items-center">
                <button @click="dismiss()" 
                        type="button" 
                        class="p-1.5 rounded-lg text-sand-300/80 hover:text-white hover:bg-forest-800/80 focus:outline-none focus:ring-2 focus:ring-emerald-400/40 transition-colors"
                        aria-label="Dismiss notice">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>
</div>
