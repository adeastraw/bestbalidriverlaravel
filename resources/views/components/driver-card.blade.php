@props(['driver'])

<div class="bg-white rounded-2xl overflow-hidden border border-sand-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group hover:-translate-y-1">
    <div class="relative h-64 overflow-hidden bg-forest-900">
        <img src="{{ $driver->photo_url }}" 
             alt="{{ $driver->name }}" 
             loading="lazy"
             class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent"></div>

        <!-- Experience Badge -->
        @if($driver->experience)
            <div class="absolute top-4 left-4">
                <span class="px-3 py-1 rounded-full bg-forest-900/90 backdrop-blur-sm text-emerald-300 text-xs font-semibold shadow-sm flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    {{ $driver->experience }} Experience
                </span>
            </div>
        @endif

        <div class="absolute bottom-3 left-4 right-4">
            <span class="text-xs text-emerald-300 font-medium uppercase tracking-wider block">Balinese Private Driver</span>
            <h3 class="font-display text-xl font-bold text-white">
                <a href="{{ route('drivers.show', $driver->slug) }}" class="hover:underline">
                    {{ $driver->name }}
                </a>
            </h3>
        </div>
    </div>

    <div class="p-5 flex-grow flex flex-col justify-between">
        <div class="space-y-3">
            <p class="text-sm text-sand-800/80 leading-relaxed line-clamp-2">
                {{ $driver->short_bio ?: Str::limit($driver->description, 100) }}
            </p>

            <div class="space-y-1.5 pt-2 border-t border-sand-100 text-xs text-sand-700">
                @if($driver->languages)
                    <div class="flex items-center gap-2">
                        <span class="text-sand-500 font-medium">Languages:</span>
                        <span class="font-semibold text-forest-900">{{ $driver->languages }}</span>
                    </div>
                @endif
                @if($driver->service_area)
                    <div class="flex items-start gap-2">
                        <span class="text-sand-500 font-medium">Area:</span>
                        <span class="text-sand-800 line-clamp-1">{{ $driver->service_area }}</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-sand-100 flex items-center justify-between gap-2">
            <a href="{{ route('drivers.show', $driver->slug) }}" 
               class="w-1/2 text-center py-2.5 rounded-xl text-xs font-semibold text-forest-800 bg-cream-200 hover:bg-forest-100 transition-colors">
                View Profile
            </a>
            <a href="{{ \App\Services\WhatsAppService::url(\App\Services\WhatsAppService::driverMessage($driver)) }}" 
               target="_blank" rel="noopener noreferrer"
               class="w-1/2 flex items-center justify-center gap-1.5 py-2.5 rounded-xl text-xs font-semibold bg-emerald-600 hover:bg-emerald-500 text-white shadow-sm transition-all">
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                </svg>
                <span>Ask Driver</span>
            </a>
        </div>
    </div>
</div>
