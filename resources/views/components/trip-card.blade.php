@props(['trip'])

<div class="bg-white rounded-2xl overflow-hidden border border-sand-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group hover:-translate-y-1">
    <!-- Card Image Header -->
    <div class="relative h-60 w-full overflow-hidden bg-forest-900">
        <img src="{{ $trip->hero_image_url }}" 
             alt="{{ $trip->name }}" 
             loading="lazy"
             class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

        <!-- Duration & Category Badges -->
        <div class="absolute top-4 left-4 flex flex-wrap gap-2">
            @if($trip->category)
                <span class="px-2.5 py-1 rounded-full bg-forest-900/80 backdrop-blur-sm text-emerald-300 text-xs font-semibold">
                    {{ $trip->category }}
                </span>
            @endif
        </div>

        @if($trip->duration)
            <div class="absolute top-4 right-4">
                <span class="px-2.5 py-1 rounded-full bg-black/60 backdrop-blur-sm text-cream-100 text-xs font-medium flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $trip->duration }}
                </span>
            </div>
        @endif

        <!-- Location tag -->
        <div class="absolute bottom-3 left-4 right-4 flex items-center text-xs text-cream-200 gap-1.5">
            <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span class="font-medium truncate">{{ $trip->location ?: 'Bali' }}</span>
        </div>
    </div>

    <!-- Content Body -->
    <div class="p-5 flex-grow flex flex-col justify-between">
        <div>
            <h3 class="font-display text-xl font-bold text-forest-900 group-hover:text-forest-700 transition-colors line-clamp-1">
                <a href="{{ route('trips.show', $trip->slug) }}">
                    {{ $trip->name }}
                </a>
            </h3>

            <p class="mt-2 text-sm text-sand-800/80 line-clamp-2 leading-relaxed">
                {{ $trip->short_description ?: Str::limit($trip->description, 110) }}
            </p>

            <!-- Destination highlights -->
            @if($trip->destinations->isNotEmpty())
                <div class="mt-3 flex flex-wrap gap-1.5">
                    @foreach($trip->destinations->take(3) as $dest)
                        <span class="text-[11px] bg-sand-100 text-sand-800 px-2 py-0.5 rounded-md font-medium">
                            • {{ $dest->name }}
                        </span>
                    @endforeach
                    @if($trip->destinations->count() > 3)
                        <span class="text-[11px] text-sand-500 py-0.5 font-medium">
                            +{{ $trip->destinations->count() - 3 }} more
                        </span>
                    @endif
                </div>
            @endif
        </div>

        <!-- Footer Price and CTA -->
        <div class="mt-6 pt-4 border-t border-sand-100 flex items-center justify-between">
            <div>
                <span class="text-xs text-sand-600 block">Starting from</span>
                <span class="text-lg font-bold text-forest-900 font-display">
                    {{ $trip->formatted_price }}
                </span>
                @if($trip->price_label)
                    <span class="text-[11px] text-sand-500 block -mt-1">{{ $trip->price_label }}</span>
                @endif
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('trips.show', $trip->slug) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-semibold text-forest-800 bg-cream-200 hover:bg-forest-100 transition-colors">
                    Details
                </a>
                <a href="{{ \App\Services\WhatsAppService::url(\App\Services\WhatsAppService::tripMessage($trip)) }}" 
                   target="_blank" rel="noopener noreferrer"
                   class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-emerald-600 hover:bg-emerald-500 text-white flex items-center gap-1.5 shadow-sm transition-all"
                   title="Book via WhatsApp">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                    </svg>
                    <span>Book</span>
                </a>
            </div>
        </div>
    </div>
</div>
