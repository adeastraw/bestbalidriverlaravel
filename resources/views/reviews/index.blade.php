@extends('layouts.app')

@section('title', 'Customer Reviews — ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', 'Read verified reviews and feedback from travelers who booked private driver tours across Bali with Best Bali Driver.')

@section('content')
    <!-- Banner Header -->
    <div class="relative bg-forest-950 py-16 text-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-forest-800 text-emerald-300 text-xs font-semibold uppercase tracking-wider mb-4">
                Real Traveler Feedback
            </span>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white mb-3">
                Customer Reviews
            </h1>
            <p class="text-base sm:text-lg text-cream-200/90 max-w-2xl mx-auto font-light">
                Discover why travelers from Australia, Europe, America, and Asia choose Best Bali Driver for their island journeys.
            </p>
        </div>
    </div>

    <!-- Reviews Grid -->
    <section class="py-16 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($reviews as $review)
                    <x-review-card :review="$review" />
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-2xl border border-sand-200">
                        <p class="text-sand-600">Reviews will be updated soon.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $reviews->links() }}
            </div>
        </div>
    </section>
@endsection
