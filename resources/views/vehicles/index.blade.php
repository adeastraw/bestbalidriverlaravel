@extends('layouts.app')

@section('title', 'Our Vehicle Fleet — ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', 'Explore our modern, air-conditioned vehicle fleet in Bali. From Toyota Avanza and Innova Reborn to 14-seater Toyota HiAce minibuses.')

@section('content')
    <!-- Banner Header -->
    <div class="relative bg-forest-950 py-16 text-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-forest-800 text-emerald-300 text-xs font-semibold uppercase tracking-wider mb-4">
                Clean, Safe & Comfortable
            </span>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white mb-3">
                Our Private Bali Vehicles
            </h1>
            <p class="text-base sm:text-lg text-cream-200/90 max-w-2xl mx-auto font-light">
                All vehicles include a licensed private driver, fuel/petrol, high-capacity cold AC, and bottled mineral water.
            </p>
        </div>
    </div>

    <!-- Vehicles Grid -->
    <section class="py-16 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($vehicles as $vehicle)
                    <x-vehicle-card :vehicle="$vehicle" />
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-2xl border border-sand-200">
                        <p class="text-sand-600">No vehicles are currently listed.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
