@props(['review'])

<div x-data="{ photoOpen: false }" class="bg-white rounded-2xl p-6 border border-sand-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between h-full group">
    <div>
        <!-- Rating Header & Verified Badge -->
        <div class="flex items-center justify-between mb-3.5">
            <div class="flex items-center gap-1 text-amber-400">
                @for($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 {{ $i <= $review->rating ? 'fill-current' : 'text-sand-200' }}" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
            </div>

            <span class="inline-flex items-center gap-1 text-[10px] font-semibold tracking-wider uppercase text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/70">
                <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Verified
            </span>
        </div>

        <!-- Review Text -->
        <p class="text-sm text-sand-800 leading-relaxed italic">
            “{{ $review->review }}”
        </p>

        <!-- Travel Photo (If attached) -->
        @if($review->image)
            <div class="mt-4 overflow-hidden rounded-xl bg-sand-100 border border-sand-200/80 aspect-[16/10] relative cursor-pointer shadow-xs"
                 @click="photoOpen = true"
                 title="Click to zoom travel photo">
                <img src="{{ $review->image_url }}" alt="Travel photo by {{ $review->customer_name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                
                <!-- Bottom overlay label -->
                <div class="absolute inset-0 bg-gradient-to-t from-forest-950/70 via-transparent to-transparent flex items-end p-2.5">
                    <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold text-cream-100 bg-forest-900/80 backdrop-blur-xs px-2 py-0.5 rounded-md border border-white/20">
                        <svg class="w-3 h-3 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Travel Photo • Click to Zoom
                    </span>
                </div>
            </div>

            <!-- Fullscreen Lightbox Modal -->
            <div x-show="photoOpen" 
                 x-cloak
                 @keydown.window.escape="photoOpen = false"
                 class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/85 backdrop-blur-sm"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                
                <div class="relative max-w-3xl w-full bg-forest-950 rounded-2xl overflow-hidden shadow-2xl border border-forest-800"
                     @click.away="photoOpen = false">
                    <!-- Close button -->
                    <button type="button" @click="photoOpen = false" 
                            class="absolute top-3 right-3 z-10 w-8 h-8 rounded-full bg-forest-900/80 text-cream-100 hover:bg-forest-800 flex items-center justify-center border border-white/20 transition-colors">
                        ✕
                    </button>

                    <img src="{{ $review->image_url }}" alt="Travel photo by {{ $review->customer_name }}" class="w-full max-h-[75vh] object-contain bg-black/40">

                    <div class="p-4 bg-forest-950 text-cream-100 flex items-center justify-between gap-4 border-t border-forest-800/80">
                        <div>
                            <span class="font-bold text-sm text-white block">{{ $review->customer_name }}</span>
                            <span class="text-xs text-sand-300">{{ $review->country ?: 'Verified Guest' }}</span>
                        </div>
                        @if($review->driver)
                            <span class="text-xs bg-forest-800 text-emerald-300 px-3 py-1 rounded-full font-medium">
                                With Driver: {{ $review->driver->name }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Reviewer Info Footer -->
    <div class="mt-5 pt-4 border-t border-sand-100 flex items-center justify-between gap-2">
        <div class="flex items-center gap-3 min-w-0">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($review->customer_name) }}&background=1b4332&color=fdfbf7" 
                 alt="{{ $review->customer_name }}" 
                 class="w-9 h-9 rounded-full object-cover border border-sand-200 flex-shrink-0 shadow-2xs">
            <div class="min-w-0 truncate">
                <span class="text-sm font-bold text-forest-900 block leading-tight truncate">
                    {{ $review->customer_name }}
                </span>
                <span class="text-xs text-sand-500 block truncate">
                    {{ $review->country ?: 'Verified Traveler' }}
                </span>
            </div>
        </div>

        @if($review->driver)
            <span class="text-[11px] bg-forest-50 text-forest-800 px-2.5 py-1 rounded-full font-medium whitespace-nowrap flex-shrink-0">
                Driver: {{ $review->driver->name }}
            </span>
        @elseif($review->trip)
            <span class="text-[11px] bg-forest-50 text-forest-800 px-2.5 py-1 rounded-full font-medium whitespace-nowrap flex-shrink-0 truncate max-w-[140px]" title="{{ $review->trip->name }}">
                {{ $review->trip->name }}
            </span>
        @endif
    </div>
</div>
