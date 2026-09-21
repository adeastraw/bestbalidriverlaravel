@extends('layouts.app')

@section('title', 'Best Bali Driver — Private Driver & Authentic Bali Tours')
@section('meta_description', 'Experience the real Bali with your own dedicated private driver. Customized day tours, comfortable air-conditioned cars, and instant booking via WhatsApp.')

@section('content')
    <!-- 1. Hero Section -->
    <section class="relative min-h-[85vh] lg:min-h-[90vh] flex items-center justify-center bg-forest-950 overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=2000&q=85" 
                 alt="Bali Emerald Rice Terraces" 
                 class="w-full h-full object-cover object-center transform scale-105 animate-pulse duration-1000">
            <div class="absolute inset-0 bali-hero-overlay"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center text-cream-100">
            <!-- Pill badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-forest-900/80 backdrop-blur-md border border-emerald-400/30 text-emerald-300 text-xs font-semibold uppercase tracking-widest mb-6">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                <span>Trusted Local Bali Travel Service</span>
            </div>

            <h1 class="font-display text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight leading-[1.1] mb-6">
                Explore Bali <span class="italic text-emerald-300 font-normal">Your Way</span>
            </h1>

            <p class="text-lg sm:text-xl text-cream-200/90 max-w-2xl mx-auto leading-relaxed mb-10 font-light">
                Private Driver • Tailored Day Tours • Spotless Vehicles • Direct WhatsApp Booking
            </p>

            <!-- Hero CTAs -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ whatsapp_url() }}" target="_blank" rel="noopener noreferrer"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-base shadow-xl shadow-emerald-950/50 hover:shadow-emerald-600/40 transition-all transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                    </svg>
                    <span>Book via WhatsApp</span>
                </a>

                <a href="{{ route('trips.index') }}" 
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-full bg-forest-900/80 hover:bg-forest-800 text-cream-100 font-semibold text-base border border-emerald-500/30 backdrop-blur-sm transition-all">
                    <span>Explore Our Trips</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <!-- Quick trust metrics -->
            <div class="mt-14 pt-8 border-t border-forest-800/60 grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-3xl mx-auto text-center">
                <div>
                    <span class="block font-display text-2xl sm:text-3xl font-bold text-emerald-300">100%</span>
                    <span class="text-xs text-sand-300 font-medium">Local Balinese Drivers</span>
                </div>
                <div>
                    <span class="block font-display text-2xl sm:text-3xl font-bold text-emerald-300">No Surge</span>
                    <span class="text-xs text-sand-300 font-medium">Fixed & Clear Pricing</span>
                </div>
                <div>
                    <span class="block font-display text-2xl sm:text-3xl font-bold text-emerald-300">Flexible</span>
                    <span class="text-xs text-sand-300 font-medium">Custom Daily Itineraries</span>
                </div>
                <div>
                    <span class="block font-display text-2xl sm:text-3xl font-bold text-emerald-300">Direct</span>
                    <span class="text-xs text-sand-300 font-medium">Instant WhatsApp Chat</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Introduction Section -->
    <section class="py-20 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-6 space-y-6">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-forest-100 text-forest-800 text-xs font-semibold tracking-wider uppercase">
                        Our Bali Philosophy
                    </span>
                    <h2 class="font-display text-3xl sm:text-4xl font-bold text-forest-900 leading-tight">
                        Travel at Your Own Pace, Guided by a Trusted Local Friend
                    </h2>
                    <p class="text-base sm:text-lg text-sand-800/80 leading-relaxed">
                        Say goodbye to rushed group tours and rigid timetables. With Best Bali Driver, you get the exclusive freedom of having a private air-conditioned vehicle and an experienced local driver completely dedicated to your journey.
                    </p>
                    <p class="text-sm text-sand-800/80 leading-relaxed">
                        Whether you want to witness dawn above Mount Batur, discover tucked-away jungle waterfalls in Ubud, explore sacred sea temples, or simply hop between southern Bali beaches, we ensure every ride is peaceful, safe, and tailored to you.
                    </p>

                    <div class="pt-2 flex flex-wrap gap-4">
                        <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-forest-800 font-bold hover:text-emerald-700 transition-colors">
                            <span>Read More About Us</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-6 relative">
                    <div class="grid grid-cols-2 gap-4">
                        <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=700&q=80" 
                             alt="Bali Tropical Waterfall" 
                             class="rounded-2xl shadow-lg object-cover h-64 sm:h-80 w-full transform hover:scale-[1.02] transition-transform">
                        <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=700&q=80" 
                             alt="Balinese Traditional Temple" 
                             class="rounded-2xl shadow-lg object-cover h-64 sm:h-80 w-full mt-8 transform hover:scale-[1.02] transition-transform">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Featured Trips Section -->
    <section class="py-20 bg-cream-200/60 border-y border-sand-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12">
                <x-section-heading 
                    badge="Handpicked Experiences"
                    title="Popular Bali Day Tours"
                    subtitle="Fully customizable day itineraries covering the island’s most unforgettable highlights."
                    :center="false"
                />
                <a href="{{ route('trips.index') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-forest-800 text-forest-900 font-semibold text-sm hover:bg-forest-800 hover:text-white transition-all self-start sm:self-auto -mt-6 sm:mt-0">
                    <span>View All Tours ({{ \App\Models\Trip::where('status', true)->count() }})</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredTrips as $trip)
                    <x-trip-card :trip="$trip" />
                @empty
                    <div class="col-span-full text-center py-12 text-sand-500">
                        No trips are currently available.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 4. Featured Drivers Section -->
    <section class="py-20 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading 
                badge="Meet The Team"
                title="Your Dedicated Local Drivers"
                subtitle="Warm, experienced, licensed Balinese drivers who know every scenic shortcut and cultural custom."
            />

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredDrivers as $driver)
                    <x-driver-card :driver="$driver" />
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('drivers.index') }}" 
                   class="inline-flex items-center gap-2 text-forest-900 font-semibold hover:text-emerald-700 transition-colors text-sm">
                    <span>See All Driver Profiles</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- 5. Featured Vehicles Fleet -->
    <section class="py-20 bg-cream-200/50 border-t border-sand-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading 
                badge="Comfort On The Road"
                title="Clean & Air-Conditioned Fleet"
                subtitle="From compact MPVs for couples to spacious 14-seater minibuses for large family groups."
            />

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredVehicles as $vehicle)
                    <x-vehicle-card :vehicle="$vehicle" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- 6. Featured Activities Section -->
    <section class="py-20 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12">
                <x-section-heading 
                    badge="Island Adventures"
                    title="Bali Outdoor Activities"
                    subtitle="Combine your day tour with rafting, volcano sunrise treks, ATV rides, and snorkeling."
                    :center="false"
                />
                <a href="{{ route('activities.index') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-forest-800 text-forest-900 font-semibold text-sm hover:bg-forest-800 hover:text-white transition-all self-start sm:self-auto -mt-6 sm:mt-0">
                    <span>Explore All Activities</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredActivities as $activity)
                    <x-activity-card :activity="$activity" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- 7. Why Choose Us Section -->
    <section class="py-20 bg-forest-900 text-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-forest-800 text-emerald-300 text-xs font-semibold tracking-wider uppercase mb-3">
                    Why Best Bali Driver
                </span>
                <h2 class="font-display text-3xl sm:text-4xl font-bold text-white">
                    The Difference Is Genuine Care
                </h2>
                <p class="mt-3 text-cream-200/80 text-base sm:text-lg font-light">
                    We treat every traveler not as a tourist, but as a guest in our Balinese home.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Pillar 1 -->
                <div class="p-6 rounded-2xl bg-forest-800/50 border border-forest-700/50 space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-600/20 text-emerald-300 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-white">Local Experience</h3>
                    <p class="text-sm text-sand-300 leading-relaxed">
                        Deep cultural understanding, temple etiquette guidance, and hidden scenic spots untouched by large tour buses.
                    </p>
                </div>

                <!-- Pillar 2 -->
                <div class="p-6 rounded-2xl bg-forest-800/50 border border-forest-700/50 space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-600/20 text-emerald-300 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-white">Comfortable Journey</h3>
                    <p class="text-sm text-sand-300 leading-relaxed">
                        Impeccably clean cars, high-output cold AC, chilled mineral water, and smooth defensive driving across all Bali terrain.
                    </p>
                </div>

                <!-- Pillar 3 -->
                <div class="p-6 rounded-2xl bg-forest-800/50 border border-forest-700/50 space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-600/20 text-emerald-300 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-white">Flexible Trip</h3>
                    <p class="text-sm text-sand-300 leading-relaxed">
                        Spend as much time as you desire at every destination. We modify routes and stops freely to match your mood and energy.
                    </p>
                </div>

                <!-- Pillar 4 -->
                <div class="p-6 rounded-2xl bg-forest-800/50 border border-forest-700/50 space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-600/20 text-emerald-300 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-white">Easy Booking</h3>
                    <p class="text-sm text-sand-300 leading-relaxed">
                        No complicated registrations or upfront deposits. Simply message us on WhatsApp with your date and hotel location.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. Reviews Preview Section -->
    <section class="py-20 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading 
                badge="Customer Stories"
                title="What Travelers Say"
                subtitle="Real experiences shared by guests who discovered Bali with Best Bali Driver."
            />

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($reviews as $review)
                    <x-review-card :review="$review" />
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('reviews.index') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-sand-200 text-forest-900 font-semibold text-sm hover:bg-forest-800 hover:text-white transition-all">
                    <span>Read All Customer Reviews</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- 9. Final CTA Section -->
    <section class="relative py-24 bg-forest-950 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1920&q=80" 
                 alt="Bali Golden Sunset" 
                 class="w-full h-full object-cover object-center opacity-30">
            <div class="absolute inset-0 bg-gradient-to-t from-forest-950 via-forest-950/80 to-forest-950/90"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-cream-100 space-y-6">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-900/60 border border-emerald-500/30 text-emerald-300 text-xs font-semibold tracking-wider uppercase">
                Start Your Bali Journey
            </span>
            <h2 class="font-display text-3xl sm:text-5xl font-bold text-white leading-tight">
                Ready to Explore Bali? Let's Make Your Journey Memorable.
            </h2>
            <p class="text-base sm:text-lg text-cream-200/80 max-w-2xl mx-auto font-light leading-relaxed">
                Connect directly with us on WhatsApp. Share your preferred travel dates, destinations, or questions, and we will arrange your personalized Bali journey right away.
            </p>
            <div class="pt-4">
                <a href="{{ whatsapp_url() }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-3 px-9 py-4 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-lg shadow-2xl hover:shadow-emerald-600/50 transition-all transform hover:scale-105">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                    </svg>
                    <span>Book via WhatsApp</span>
                </a>
            </div>
        </div>
    </section>
@endsection
