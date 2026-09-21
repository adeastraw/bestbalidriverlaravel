<footer class="bg-forest-950 text-cream-200 border-t border-forest-800/80 pt-16 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-8 pb-12 border-b border-forest-800/60">
            <!-- Brand & Philosophy -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-emerald-700 flex items-center justify-center text-cream-100">
                        <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="font-display text-xl font-bold text-cream-100 tracking-wide">
                        Best Bali Driver
                    </span>
                </div>
                <p class="text-sm text-sand-200/80 leading-relaxed">
                    {{ setting('footer_text', 'Your trusted local private driver and tour companion in Bali. Friendly hospitality, spotless vehicles, and flexible itineraries tailored to your holiday pace.') }}
                </p>
                <div class="pt-2">
                    <a href="{{ whatsapp_url() }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-emerald-700/80 hover:bg-emerald-600 text-white text-xs font-semibold uppercase tracking-wider transition-colors">
                        <span>Direct WhatsApp</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-display text-base font-semibold text-cream-100 mb-4 tracking-wide">
                    Explore Bali
                </h4>
                <ul class="space-y-2.5 text-sm">
                    <li>
                        <a href="{{ route('trips.index') }}" class="text-sand-300 hover:text-emerald-300 transition-colors">Day Trips & Tours</a>
                    </li>
                    <li>
                        <a href="{{ route('activities.index') }}" class="text-sand-300 hover:text-emerald-300 transition-colors">Outdoor Activities</a>
                    </li>
                    <li>
                        <a href="{{ route('vehicles.index') }}" class="text-sand-300 hover:text-emerald-300 transition-colors">Our Vehicle Fleet</a>
                    </li>
                    <li>
                        <a href="{{ route('drivers.index') }}" class="text-sand-300 hover:text-emerald-300 transition-colors">Meet Our Drivers</a>
                    </li>
                    <li>
                        <a href="{{ route('reviews.index') }}" class="text-sand-300 hover:text-emerald-300 transition-colors">Traveler Reviews</a>
                    </li>
                </ul>
            </div>

            <!-- Company & Trust -->
            <div>
                <h4 class="font-display text-base font-semibold text-cream-100 mb-4 tracking-wide">
                    Information
                </h4>
                <ul class="space-y-2.5 text-sm">
                    <li>
                        <a href="{{ route('about') }}" class="text-sand-300 hover:text-emerald-300 transition-colors">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-sand-300 hover:text-emerald-300 transition-colors">Contact & Location</a>
                    </li>
                    <li>
                        <span class="text-sand-400 text-xs block pt-2">Service Coverage:</span>
                        <span class="text-sand-300 text-xs">Ubud, Seminyak, Canggu, Kuta, Sanur, Nusa Dua, Uluwatu, Bedugul, Karangasem & Nusa Penida</span>
                    </li>
                </ul>
            </div>

            <!-- Contact & Hours -->
            <div>
                <h4 class="font-display text-base font-semibold text-cream-100 mb-4 tracking-wide">
                    Get in Touch
                </h4>
                <ul class="space-y-3 text-sm text-sand-300">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ setting('address', 'Ubud, Gianyar, Bali - Indonesia') }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                        </svg>
                        <a href="{{ whatsapp_url() }}" target="_blank" rel="noopener noreferrer" class="hover:text-emerald-300 transition-colors">
                            +{{ setting('whatsapp_number', '6281234567890') }}
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:{{ setting('email', 'info@bestbalidriver.com') }}" class="hover:text-emerald-300 transition-colors">
                            {{ setting('email', 'info@bestbalidriver.com') }}
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ setting('business_hours', 'Daily: 07:00 AM - 10:00 PM WITA') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-sand-400 gap-4">
            <p>© {{ date('Y') }} {{ setting('business_name', 'Best Bali Driver') }}. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.login') }}" class="text-sand-400 hover:text-emerald-300 transition-colors">Admin Portal</a>
                <span>Bali, Indonesia</span>
            </div>
        </div>
    </div>
</footer>
