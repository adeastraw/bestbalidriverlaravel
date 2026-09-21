@extends('layouts.app')

@section('title', $vehicle->name . ' — Private Car Rental with Driver Bali | ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', $vehicle->name . ' with private driver in Bali. Up to ' . $vehicle->capacity . ' passengers. High AC, comfortable seating. Inquire on WhatsApp.')
@section('og_image', $vehicle->photo_url)

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-cream-200/60 border-b border-sand-200/80 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-sand-600 flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-forest-900 transition-colors">Home</a>
            <span>/</span>
            <a href="{{ route('vehicles.index') }}" class="hover:text-forest-900 transition-colors">Vehicles</a>
            <span>/</span>
            <span class="text-forest-900 font-semibold truncate">{{ $vehicle->name }}</span>
        </div>
    </div>

    <!-- Vehicle Details Section -->
    <section class="py-14 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Vehicle Gallery -->
                <div class="lg:col-span-7 space-y-4" x-data="{ activeImage: '{{ $vehicle->photo_url }}' }">
                    <div class="bg-white rounded-3xl overflow-hidden border border-sand-200 shadow-md h-80 sm:h-[450px]">
                        <img :src="activeImage" alt="{{ $vehicle->name }}" class="w-full h-full object-cover object-center transition-all duration-300">
                    </div>

                    <!-- Gallery Thumbnails -->
                    @if($vehicle->images->count() > 0)
                        <div class="flex items-center gap-3 overflow-x-auto pb-2">
                            <button @click="activeImage = '{{ $vehicle->photo_url }}'" 
                                    class="w-20 h-20 rounded-xl overflow-hidden border-2 flex-shrink-0 transition-all"
                                    :class="activeImage === '{{ $vehicle->photo_url }}' ? 'border-emerald-600 shadow-md scale-105' : 'border-transparent opacity-75 hover:opacity-100'">
                                <img src="{{ $vehicle->photo_url }}" alt="Primary vehicle photo" class="w-full h-full object-cover">
                            </button>
                            @foreach($vehicle->images as $img)
                                <button @click="activeImage = '{{ $img->image_url }}'" 
                                        class="w-20 h-20 rounded-xl overflow-hidden border-2 flex-shrink-0 transition-all"
                                        :class="activeImage === '{{ $img->image_url }}' ? 'border-emerald-600 shadow-md scale-105' : 'border-transparent opacity-75 hover:opacity-100'">
                                    <img src="{{ $img->image_url }}" alt="{{ $img->alt_text ?: $vehicle->name }}" class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif

                    <!-- Vehicle Description -->
                    <div class="bg-white rounded-3xl p-8 border border-sand-200 shadow-sm mt-8 space-y-4">
                        <h2 class="font-display text-2xl font-bold text-forest-900">
                            Vehicle Overview
                        </h2>
                        <div class="prose max-w-none text-sand-800 text-sm sm:text-base leading-relaxed">
                            {!! nl2br(e($vehicle->description)) !!}
                        </div>
                    </div>
                </div>

                <!-- Specifications & Booking Card -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="bg-white rounded-3xl p-8 border border-sand-200 shadow-lg sticky top-28 space-y-6">
                        <div>
                            @if($vehicle->type)
                                <span class="text-xs uppercase tracking-wider text-emerald-700 font-bold block mb-1">
                                    {{ $vehicle->type }}
                                </span>
                            @endif
                            <h1 class="font-display text-3xl font-bold text-forest-900">
                                {{ $vehicle->name }}
                            </h1>
                            <p class="text-xs text-sand-500 mt-1">
                                Complete with licensed driver, fuel, and bottled water.
                            </p>
                        </div>

                        <!-- Quick Specs Matrix -->
                        <div class="grid grid-cols-2 gap-3 p-4 rounded-2xl bg-cream-100/80 border border-sand-200/80 text-sm">
                            <div>
                                <span class="text-xs text-sand-500 block">Passenger Capacity</span>
                                <span class="font-bold text-forest-900 flex items-center gap-1 mt-0.5">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Up to {{ $vehicle->capacity }} Seats
                                </span>
                            </div>
                            <div>
                                <span class="text-xs text-sand-500 block">Luggage Space</span>
                                <span class="font-bold text-forest-900 flex items-center gap-1 mt-0.5">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                    {{ $vehicle->luggage_capacity ?: '2-3' }} Suitcases
                                </span>
                            </div>
                        </div>

                        <!-- Facilities Checklist -->
                        <div>
                            <h3 class="text-xs font-semibold text-sand-700 uppercase tracking-wider mb-3">
                                Onboard Inclusions & Amenities
                            </h3>
                            <ul class="space-y-2 text-sm text-sand-800">
                                @foreach($vehicle->facilities_list as $fac)
                                    <li class="flex items-center gap-2.5">
                                        <div class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </div>
                                        <span>{{ $fac }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- WhatsApp Action CTA -->
                        <div class="pt-4 border-t border-sand-100">
                            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer"
                               class="w-full flex items-center justify-center gap-3 px-6 py-4 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-base shadow-lg transition-all transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                                </svg>
                                <span>Inquire Rates on WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
