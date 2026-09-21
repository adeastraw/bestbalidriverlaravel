@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('header_title', 'Overview & Content Metrics')

@section('content')
    <div class="space-y-8">
        <!-- Metric Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
            <div class="bg-white p-5 rounded-2xl border border-sand-200 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs text-sand-500 font-semibold uppercase tracking-wider block">Tours & Trips</span>
                    <span class="font-display text-3xl font-bold text-forest-900 mt-1 block">{{ $stats['trips'] }}</span>
                </div>
                <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-sand-200 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs text-sand-500 font-semibold uppercase tracking-wider block">Drivers</span>
                    <span class="font-display text-3xl font-bold text-forest-900 mt-1 block">{{ $stats['drivers'] }}</span>
                </div>
                <div class="w-11 h-11 rounded-xl bg-forest-100 text-forest-800 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-sand-200 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs text-sand-500 font-semibold uppercase tracking-wider block">Vehicle Fleet</span>
                    <span class="font-display text-3xl font-bold text-forest-900 mt-1 block">{{ $stats['vehicles'] }}</span>
                </div>
                <div class="w-11 h-11 rounded-xl bg-sand-200 text-sand-800 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-sand-200 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs text-sand-500 font-semibold uppercase tracking-wider block">Activities</span>
                    <span class="font-display text-3xl font-bold text-forest-900 mt-1 block">{{ $stats['activities'] }}</span>
                </div>
                <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-sand-200 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs text-sand-500 font-semibold uppercase tracking-wider block">Reviews</span>
                    <span class="font-display text-3xl font-bold text-forest-900 mt-1 block">{{ $stats['reviews'] }}</span>
                </div>
                <div class="w-11 h-11 rounded-xl bg-rose-100 text-rose-800 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Quick Actions Bar -->
        <div class="bg-white p-6 rounded-2xl border border-sand-200 shadow-sm flex flex-wrap items-center gap-3">
            <span class="text-xs font-bold text-sand-500 uppercase tracking-wider mr-2">Quick Actions:</span>
            <a href="{{ route('admin.trips.create') }}" class="px-4 py-2 bg-forest-900 hover:bg-forest-800 text-white text-xs font-semibold rounded-xl transition-colors">
                + New Trip / Tour
            </a>
            <a href="{{ route('admin.drivers.create') }}" class="px-4 py-2 bg-forest-900 hover:bg-forest-800 text-white text-xs font-semibold rounded-xl transition-colors">
                + New Driver Profile
            </a>
            <a href="{{ route('admin.vehicles.create') }}" class="px-4 py-2 bg-forest-900 hover:bg-forest-800 text-white text-xs font-semibold rounded-xl transition-colors">
                + New Vehicle
            </a>
            <a href="{{ route('admin.activities.create') }}" class="px-4 py-2 bg-forest-900 hover:bg-forest-800 text-white text-xs font-semibold rounded-xl transition-colors">
                + New Activity
            </a>
            <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 bg-sand-200 hover:bg-sand-300 text-forest-900 text-xs font-semibold rounded-xl transition-colors">
                ⚙ Site Settings
            </a>
        </div>

        <!-- Tables: Recent Trips & Recent Reviews -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Tours -->
            <div class="bg-white rounded-2xl border border-sand-200 shadow-sm overflow-hidden">
                <div class="p-5 border-b border-sand-100 flex items-center justify-between">
                    <h3 class="font-display text-lg font-bold text-forest-900">Recent Tours</h3>
                    <a href="{{ route('admin.trips.index') }}" class="text-xs text-emerald-700 font-semibold hover:underline">View all</a>
                </div>
                <div class="divide-y divide-sand-100">
                    @foreach($recentTrips as $trip)
                        <div class="p-4 flex items-center justify-between hover:bg-cream-50 transition-colors">
                            <div class="flex items-center gap-3">
                                <img src="{{ $trip->hero_image_url }}" alt="{{ $trip->name }}" class="w-12 h-12 rounded-xl object-cover">
                                <div>
                                    <span class="font-bold text-sm text-forest-900 block leading-tight">{{ $trip->name }}</span>
                                    <span class="text-xs text-sand-500">{{ $trip->location }} • {{ $trip->formatted_price }}</span>
                                </div>
                            </div>
                            <a href="{{ route('admin.trips.edit', $trip->id) }}" class="text-xs font-semibold text-emerald-700 hover:underline">
                                Edit
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Reviews -->
            <div class="bg-white rounded-2xl border border-sand-200 shadow-sm overflow-hidden">
                <div class="p-5 border-b border-sand-100 flex items-center justify-between">
                    <h3 class="font-display text-lg font-bold text-forest-900">Recent Reviews</h3>
                    <a href="{{ route('admin.reviews.index') }}" class="text-xs text-emerald-700 font-semibold hover:underline">View all</a>
                </div>
                <div class="divide-y divide-sand-100">
                    @foreach($recentReviews as $rev)
                        <div class="p-4 flex items-start justify-between hover:bg-cream-50 transition-colors">
                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-sm text-forest-900">{{ $rev->customer_name }}</span>
                                    <span class="text-xs text-sand-500">({{ $rev->country ?: 'Traveler' }})</span>
                                </div>
                                <p class="text-xs text-sand-700 italic line-clamp-2">"{{ $rev->review }}"</p>
                            </div>
                            <a href="{{ route('admin.reviews.edit', $rev->id) }}" class="text-xs font-semibold text-emerald-700 hover:underline flex-shrink-0 ml-2">
                                Edit
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
