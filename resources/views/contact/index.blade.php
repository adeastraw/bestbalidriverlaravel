@extends('layouts.app')

@section('title', 'Contact Us — ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', 'Contact Best Bali Driver directly on WhatsApp or by inquiry. Private driver bookings, airport transfers, and custom Bali tour planning.')

@section('content')
    <!-- Banner Header -->
    <div class="relative bg-forest-950 py-16 text-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-forest-800 text-emerald-300 text-xs font-semibold uppercase tracking-wider mb-4">
                We're Here To Help
            </span>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white mb-3">
                Contact Best Bali Driver
            </h1>
            <p class="text-base sm:text-lg text-cream-200/90 max-w-2xl mx-auto font-light">
                Reach out to us directly on WhatsApp for instant replies, custom tour quotes, and easy car bookings.
            </p>
        </div>
    </div>

    <!-- Contact Content Grid -->
    <section class="py-16 bg-cream-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <!-- Direct WhatsApp Feature Card (5 cols) -->
                <div class="lg:col-span-5 bg-forest-900 text-cream-100 rounded-3xl p-8 border border-forest-800 shadow-xl space-y-6">
                    <div>
                        <span class="text-xs uppercase tracking-wider text-emerald-300 font-bold block mb-1">
                            Fastest Response
                        </span>
                        <h2 class="font-display text-2xl sm:text-3xl font-bold text-white">
                            Direct WhatsApp Chat
                        </h2>
                        <p class="text-sm text-sand-300 mt-2 leading-relaxed">
                            For instant answers regarding tour availability, customized routes, or last-minute airport transfers, WhatsApp is our primary communication line.
                        </p>
                    </div>

                    <div class="pt-2">
                        <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer"
                           class="w-full flex items-center justify-center gap-3 px-6 py-4 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-base shadow-lg transition-all transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                            </svg>
                            <span>Chat on WhatsApp</span>
                        </a>
                    </div>

                    <!-- Contact details -->
                    <div class="space-y-4 pt-6 border-t border-forest-800/80 text-sm text-sand-300">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <strong class="text-white block font-medium">Headquarters:</strong>
                                <span>{{ setting('address', 'Jl. Raya Pengosekan, Ubud, Gianyar, Bali - Indonesia') }}</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div>
                                <strong class="text-white block font-medium">Email:</strong>
                                <a href="mailto:{{ setting('email', 'info@bestbalidriver.com') }}" class="hover:text-emerald-300 transition-colors">
                                    {{ setting('email', 'info@bestbalidriver.com') }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <strong class="text-white block font-medium">Operating Hours:</strong>
                                <span>{{ setting('business_hours', 'Daily: 07:00 AM - 10:00 PM WITA') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inquiry Message Form (7 cols) -->
                <div class="lg:col-span-7 bg-white rounded-3xl p-8 border border-sand-200 shadow-sm space-y-6">
                    <div>
                        <h3 class="font-display text-2xl font-bold text-forest-900">
                            Send an Inquiry
                        </h3>
                        <p class="text-xs sm:text-sm text-sand-600 mt-1">
                            Fill in your details below and click Send — you will be redirected straight to WhatsApp with your pre-formatted inquiry ready to send.
                        </p>
                    </div>

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Your Full Name *</label>
                            <input type="text" name="name" id="name" required placeholder="e.g. John Doe"
                                   class="w-full rounded-xl border-sand-300 focus:border-emerald-600 focus:ring-emerald-600 text-sm">
                        </div>

                        <div>
                            <label for="email" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Email Address (Optional)</label>
                            <input type="email" name="email" id="email" placeholder="john@example.com"
                                   class="w-full rounded-xl border-sand-300 focus:border-emerald-600 focus:ring-emerald-600 text-sm">
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Your Message / Tour Request *</label>
                            <textarea name="message" id="message" rows="5" required 
                                      placeholder="Tell us your travel dates, pickup location, group size, or places you'd love to visit in Bali..."
                                      class="w-full rounded-xl border-sand-300 focus:border-emerald-600 focus:ring-emerald-600 text-sm"></textarea>
                        </div>

                        <button type="submit" 
                                class="w-full py-3.5 px-6 rounded-xl bg-forest-900 hover:bg-forest-800 text-white font-semibold text-sm transition-colors flex items-center justify-center gap-2">
                            <span>Send via WhatsApp</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
