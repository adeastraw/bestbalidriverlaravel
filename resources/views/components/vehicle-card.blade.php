@props(['vehicle'])

<div class="bg-white rounded-2xl overflow-hidden border border-sand-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group hover:-translate-y-1">
    <div class="relative h-56 overflow-hidden bg-forest-900">
        <img src="{{ $vehicle->photo_url }}" 
             alt="{{ $vehicle->name }}" 
             loading="lazy"
             class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-transparent to-transparent"></div>

        @if($vehicle->type)
            <div class="absolute top-4 left-4">
                <span class="px-2.5 py-1 rounded-full bg-forest-900/80 backdrop-blur-sm text-emerald-300 text-xs font-semibold">
                    {{ $vehicle->type }}
                </span>
            </div>
        @endif

        <div class="absolute bottom-3 left-4 right-4">
            <h3 class="font-display text-xl font-bold text-white">
                <a href="{{ route('vehicles.show', $vehicle->slug) }}" class="hover:underline">
                    {{ $vehicle->name }}
                </a>
            </h3>
        </div>
    </div>

    <div class="p-5 flex-grow flex flex-col justify-between">
        <div class="space-y-3">
            <!-- Capacity badges -->
            <div class="flex items-center gap-4 text-xs text-sand-800">
                <div class="flex items-center gap-1.5 font-medium">
                    <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>Up to {{ $vehicle->capacity }} Seats</span>
                </div>
                @if($vehicle->luggage_capacity)
                    <div class="flex items-center gap-1.5 font-medium">
                        <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        <span>{{ $vehicle->luggage_capacity }} Suitcases</span>
                    </div>
                @endif
            </div>

            <p class="text-sm text-sand-800/80 leading-relaxed line-clamp-2">
                {{ $vehicle->description ?: 'Spotless, fully air-conditioned car with a seasoned local driver.' }}
            </p>

            <!-- Key facilities -->
            <div class="flex flex-wrap gap-1.5 pt-1">
                @foreach(array_slice($vehicle->facilities_list, 0, 3) as $fac)
                    <span class="text-[11px] bg-sand-100 text-sand-800 px-2.5 py-0.5 rounded-full font-medium">
                        ✓ {{ $fac }}
                    </span>
                @endforeach
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-sand-100 flex items-center justify-between gap-2">
            <a href="{{ route('vehicles.show', $vehicle->slug) }}" 
               class="w-1/2 text-center py-2.5 rounded-xl text-xs font-semibold text-forest-800 bg-cream-200 hover:bg-forest-100 transition-colors">
                View Details
            </a>
            <a href="{{ \App\Services\WhatsAppService::url(\App\Services\WhatsAppService::vehicleMessage($vehicle)) }}" 
               target="_blank" rel="noopener noreferrer"
               class="w-1/2 flex items-center justify-center gap-1.5 py-2.5 rounded-xl text-xs font-semibold bg-emerald-600 hover:bg-emerald-500 text-white shadow-sm transition-all">
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                </svg>
                <span>Ask Fleet</span>
            </a>
        </div>
    </div>
</div>
