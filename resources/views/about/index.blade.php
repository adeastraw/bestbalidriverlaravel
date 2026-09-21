@extends('layouts.app')

@section('title', 'About Us — ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', 'Learn about Best Bali Driver: our local Balinese team, service philosophy, commitment to honest hospitality, and island travel coverage.')

@section('content')
    <!-- Page Header Banner -->
    <div class="relative bg-forest-950 py-20 overflow-hidden text-cream-100">
        <div class="absolute inset-0 z-0 opacity-25">
            <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=1800&q=80" 
                 alt="Bali temple culture" 
                 class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-forest-800 text-emerald-300 text-xs font-semibold uppercase tracking-wider mb-4">
                Local Hospitality & Travel
            </span>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white mb-4">
                About Best Bali Driver
            </h1>
            <p class="text-base sm:text-lg text-cream-200/90 max-w-2xl mx-auto font-light">
                Discover the story, people, and genuine Balinese care behind every mile you travel with us.
            </p>
        </div>
    </div>

    <!-- Main About Story -->
    <section class="py-20 bg-cream-100">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 items-center">
                <div class="md:col-span-7 space-y-5">
                    <h2 class="font-display text-3xl font-bold text-forest-900">
                        Born from Local Passion for the Island of the Gods
                    </h2>
                    <p class="text-sand-800 leading-relaxed">
                        {{ setting('about_story', 'Best Bali Driver was founded by local Balinese drivers passionate about sharing the true beauty and cultural heritage of our island. We understand that every traveler has a unique dream journey, which is why we focus on flexibility, comfort, safety, and personalized Balinese hospitality.') }}
                    </p>
                    <p class="text-sand-800 leading-relaxed">
                        We are not an anonymous corporate broker or high-commission intermediary. When you book with Best Bali Driver, you are communicating directly with local professionals who actually live in Bali, understand island traffic rhythms, and take immense pride in showing you their home.
                    </p>
                </div>
                <div class="md:col-span-5">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=700&q=80" 
                         alt="Friendly Balinese driver" 
                         class="rounded-2xl shadow-xl w-full object-cover h-80">
                </div>
            </div>

            <!-- 5 Guiding Pillars of Our Approach -->
            <div class="pt-8">
                <x-section-heading 
                    badge="Our Principles"
                    title="How We Care For Your Bali Journey"
                    subtitle="Every day tour and airport transfer is guided by 5 core values."
                />

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-2xl border border-sand-200 shadow-sm space-y-3">
                        <div class="w-10 h-10 rounded-lg bg-forest-100 text-forest-800 flex items-center justify-center font-bold">1</div>
                        <h3 class="font-display text-lg font-bold text-forest-900">Deep Local Knowledge</h3>
                        <p class="text-xs sm:text-sm text-sand-800/80 leading-relaxed">
                            We know the optimal times to arrive at popular attractions before large tour buses, the authentic local warungs with delicious food, and tranquil hidden gems.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-sand-200 shadow-sm space-y-3">
                        <div class="w-10 h-10 rounded-lg bg-forest-100 text-forest-800 flex items-center justify-center font-bold">2</div>
                        <h3 class="font-display text-lg font-bold text-forest-900">Comfortable Travel</h3>
                        <p class="text-xs sm:text-sm text-sand-800/80 leading-relaxed">
                            Our vehicles undergo regular mechanical servicing, are cleaned daily, and feature strong air conditioning so you remain refreshed under the tropical sun.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-sand-200 shadow-sm space-y-3">
                        <div class="w-10 h-10 rounded-lg bg-forest-100 text-forest-800 flex items-center justify-center font-bold">3</div>
                        <h3 class="font-display text-lg font-bold text-forest-900">Flexible Planning</h3>
                        <p class="text-xs sm:text-sm text-sand-800/80 leading-relaxed">
                            Want to linger longer at a coffee plantation, skip a temple, or stop at a scenic viewpoint? Your day is 100% customizable without penalty.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-sand-200 shadow-sm space-y-3">
                        <div class="w-10 h-10 rounded-lg bg-forest-100 text-forest-800 flex items-center justify-center font-bold">4</div>
                        <h3 class="font-display text-lg font-bold text-forest-900">Direct Communication</h3>
                        <p class="text-xs sm:text-sm text-sand-800/80 leading-relaxed">
                            Communicate quickly via WhatsApp before, during, and after your trip. Quick responses with transparent advice and zero confusion.
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-sand-200 shadow-sm space-y-3">
                        <div class="w-10 h-10 rounded-lg bg-forest-100 text-forest-800 flex items-center justify-center font-bold">5</div>
                        <h3 class="font-display text-lg font-bold text-forest-900">Fair & Transparent Rates</h3>
                        <p class="text-xs sm:text-sm text-sand-800/80 leading-relaxed">
                            No hidden petrol surcharges, surprise fees, or aggressive commissions from mandatory shopping stops. We believe in honest business.
                        </p>
                    </div>
                    <div class="bg-forest-900 text-cream-100 p-6 rounded-2xl flex flex-col justify-between">
                        <div>
                            <h3 class="font-display text-lg font-bold text-white mb-2">Ready to Book?</h3>
                            <p class="text-xs text-cream-200/80 leading-relaxed">
                                Chat with us directly on WhatsApp to check date availability and vehicle rates.
                            </p>
                        </div>
                        <div class="pt-4">
                            <a href="{{ whatsapp_url() }}" target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-semibold">
                                <span>Message on WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
