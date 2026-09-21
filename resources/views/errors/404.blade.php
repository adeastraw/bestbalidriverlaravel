@extends('layouts.app')

@section('title', 'Page Not Found — Best Bali Driver')

@section('content')
    <div class="min-h-[70vh] flex items-center justify-center bg-cream-100 py-20 px-4">
        <div class="max-w-md w-full text-center space-y-6">
            <div class="w-20 h-20 rounded-full bg-forest-100 text-forest-800 mx-auto flex items-center justify-center">
                <svg class="w-10 h-10 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>

            <div class="space-y-2">
                <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest block">404 Error</span>
                <h1 class="font-display text-3xl sm:text-4xl font-bold text-forest-900">
                    Looks like this journey took a wrong turn.
                </h1>
                <p class="text-sm text-sand-700 leading-relaxed">
                    The page or tour itinerary you are looking for might have been moved or doesn’t exist.
                </p>
            </div>

            <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('home') }}" 
                   class="w-full sm:w-auto px-6 py-3 rounded-full bg-forest-900 hover:bg-forest-800 text-white text-sm font-semibold transition-colors">
                    Back to Home
                </a>
                <a href="{{ route('trips.index') }}" 
                   class="w-full sm:w-auto px-6 py-3 rounded-full bg-cream-200 hover:bg-sand-200 text-forest-900 text-sm font-semibold transition-colors">
                    Explore Tours
                </a>
            </div>
        </div>
    </div>
@endsection
