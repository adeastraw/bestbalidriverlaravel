@extends('layouts.app')

@section('title', 'Bali Tourist Activities & Adventures — ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', 'Book thrilling Bali outdoor activities: Ayung River white water rafting, Mount Batur sunrise trekking, Ubud ATV quad biking, and Nusa Penida snorkeling.')

@section('content')
    <!-- Banner Header -->
    <div class="relative bg-forest-950 py-16 text-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-forest-800 text-emerald-300 text-xs font-semibold uppercase tracking-wider mb-4">
                Thrilling Island Adventures
            </span>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white mb-3">
                Bali Outdoor Activities
            </h1>
            <p class="text-base sm:text-lg text-cream-200/90 max-w-2xl mx-auto font-light">
                Combine your private car journey with authentic Bali adventures. Professional instructors, certified gear, and hotel transfers.
            </p>
        </div>
    </div>

    <!-- Activities Grid -->
    <section class="py-16 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($activities as $activity)
                    <x-activity-card :activity="$activity" />
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-2xl border border-sand-200">
                        <p class="text-sand-600">Activities will be updated soon. Please message us on WhatsApp for custom requests.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
