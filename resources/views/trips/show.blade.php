@extends('layouts.app')

@section('title', $trip->name . ' — Private Bali Tour | ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', Str::limit($trip->short_description ?: $trip->description, 150))
@section('og_image', $trip->hero_image_url)
@section('og_type', 'article')
@section('canonical', route('trips.show', $trip->slug))

@section('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ rtrim(config('app.url', 'https://bestbalidriver.site'), '/') }}"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Trips",
          "item": "{{ route('trips.index') }}"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ $trip->name }}",
          "item": "{{ route('trips.show', $trip->slug) }}"
        }
      ]
    },
    {
      "@type": "TouristTrip",
      "@id": "{{ route('trips.show', $trip->slug) }}/#trip",
      "name": "{{ $trip->name }}",
      "description": "{{ addslashes(Str::limit($trip->short_description ?: $trip->description, 250)) }}",
      "image": "{{ $trip->hero_image_url }}",
      "touristType": "International Tourists",
      @if($trip->duration)
      "duration": "{{ $trip->duration }}",
      @endif
      "provider": {
        "@id": "{{ rtrim(config('app.url', 'https://bestbalidriver.site'), '/') }}/#agency"
      }
      @if($trip->price)
      ,"offers": {
        "@type": "Offer",
        "price": "{{ $trip->price }}",
        "priceCurrency": "IDR",
        "availability": "https://schema.org/InStock",
        "url": "{{ route('trips.show', $trip->slug) }}"
      }
      @endif
    }
  ]
}
</script>
@endsection

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-cream-200/60 border-b border-sand-200/80 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-sand-600 flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-forest-900 transition-colors">Home</a>
            <span>/</span>
            <a href="{{ route('trips.index') }}" class="hover:text-forest-900 transition-colors">Trips</a>
            <span>/</span>
            <span class="text-forest-900 font-semibold truncate">{{ $trip->name }}</span>
        </div>
    </div>

    <!-- Trip Hero -->
    <div class="relative min-h-[50vh] sm:min-h-[55vh] flex items-end bg-forest-950 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ $trip->hero_image_url }}" alt="{{ $trip->name }} - Bali Day Tour with Private Driver" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/20"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 pt-28 text-white w-full">
            <div class="flex flex-wrap gap-2 mb-3">
                @if($trip->category)
                    <span class="px-3 py-1 rounded-full bg-emerald-600 text-white text-xs font-semibold">
                        {{ $trip->category }}
                    </span>
                @endif
                @if($trip->location)
                    <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-sm text-cream-200 text-xs font-medium flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $trip->location }}
                    </span>
                @endif
                @if($trip->duration)
                    <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-sm text-cream-200 text-xs font-medium flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $trip->duration }}
                    </span>
                @endif
            </div>

            <h1 class="font-display text-3xl sm:text-5xl font-extrabold text-white max-w-4xl leading-tight">
                {{ $trip->name }}
            </h1>
        </div>
    </div>

    <!-- Main Content Section -->
    <section class="py-14 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Left Details (8 cols) -->
                <div class="lg:col-span-8 space-y-12">
                    <!-- Overview -->
                    <div class="bg-white rounded-3xl p-8 border border-sand-200 shadow-sm space-y-4">
                        <h2 class="font-display text-2xl font-bold text-forest-900">
                            Trip Overview
                        </h2>
                        <div class="prose max-w-none text-sand-800 text-sm sm:text-base leading-relaxed space-y-4">
                            {!! nl2br(e($trip->description ?: $trip->short_description)) !!}
                        </div>
                    </div>

                    <!-- Highlight Destinations -->
                    @if($trip->destinations->isNotEmpty())
                        <div class="space-y-6">
                            <div>
                                <span class="text-xs uppercase tracking-wider text-emerald-700 font-bold block mb-1">
                                    Tour Itinerary Stops
                                </span>
                                <h2 class="font-display text-2xl sm:text-3xl font-bold text-forest-900">
                                    Destinations Visited
                                </h2>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @foreach($trip->destinations as $dest)
                                    <div class="bg-white rounded-2xl overflow-hidden border border-sand-200 shadow-sm flex flex-col group">
                                        @if($dest->image)
                                            <div class="h-44 w-full overflow-hidden bg-forest-950">
                                                <img src="{{ $dest->image_url }}" alt="{{ $dest->name }} - {{ $trip->name }} Bali Tour Destination" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            </div>
                                        @endif
                                        <div class="p-5 flex-grow">
                                            <h3 class="font-display text-lg font-bold text-forest-900 mb-1.5">
                                                {{ $dest->name }}
                                            </h3>
                                            <p class="text-xs sm:text-sm text-sand-800/80 leading-relaxed">
                                                {{ $dest->description }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Timeline Itinerary -->
                    @if($trip->itineraries->isNotEmpty())
                        <div class="bg-white rounded-3xl p-8 border border-sand-200 shadow-sm space-y-6">
                            <div>
                                <span class="text-xs uppercase tracking-wider text-emerald-700 font-bold block mb-1">
                                    Schedule & Flow
                                </span>
                                <h2 class="font-display text-2xl sm:text-3xl font-bold text-forest-900">
                                    Tour Timeline
                                </h2>
                                <p class="text-xs text-sand-500 mt-1">
                                    *Timings are flexible guidelines and can be adjusted according to your preference on the day.
                                </p>
                            </div>

                            <div class="relative border-l-2 border-emerald-500/30 ml-3 sm:ml-4 space-y-8 pl-6 sm:pl-8 py-2">
                                @foreach($trip->itineraries as $step)
                                    <div class="relative">
                                        <!-- Node Bullet -->
                                        <div class="absolute -left-[31px] sm:-left-[39px] top-1.5 w-4 h-4 rounded-full bg-emerald-600 border-4 border-white shadow-sm"></div>

                                        @if($step->time_label)
                                            <span class="inline-block text-xs font-bold text-emerald-800 bg-emerald-50 px-2.5 py-0.5 rounded-full mb-1">
                                                {{ $step->time_label }}
                                            </span>
                                        @endif

                                        <h4 class="font-display text-lg font-bold text-forest-900">
                                            {{ $step->title }}
                                        </h4>

                                        @if($step->description)
                                            <p class="mt-1 text-sm text-sand-800/80 leading-relaxed">
                                                {{ $step->description }}
                                            </p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Inclusions & Exclusions -->
                    @if($trip->inclusions->isNotEmpty())
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Included -->
                            <div class="bg-white rounded-3xl p-7 border border-sand-200 shadow-sm space-y-4">
                                <h3 class="font-display text-xl font-bold text-forest-900 flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs font-bold">✓</span>
                                    <span>What's Included</span>
                                </h3>
                                <ul class="space-y-2.5 text-sm text-sand-800">
                                    @foreach($trip->includedItems as $item)
                                        <li class="flex items-start gap-2.5">
                                            <svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            <span>{{ $item->description }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Not Included -->
                            <div class="bg-white rounded-3xl p-7 border border-sand-200 shadow-sm space-y-4">
                                <h3 class="font-display text-xl font-bold text-forest-900 flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-full bg-rose-100 text-rose-700 flex items-center justify-center text-xs font-bold">✕</span>
                                    <span>Not Included</span>
                                </h3>
                                <ul class="space-y-2.5 text-sm text-sand-800">
                                    @foreach($trip->notIncludedItems as $item)
                                        <li class="flex items-start gap-2.5">
                                            <svg class="w-4 h-4 text-rose-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            <span>{{ $item->description }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Connectable Activities -->
                    @if($trip->activities->isNotEmpty())
                        <div class="space-y-6">
                            <div>
                                <span class="text-xs uppercase tracking-wider text-emerald-700 font-bold block mb-1">
                                    Optional Add-ons
                                </span>
                                <h3 class="font-display text-2xl font-bold text-forest-900">
                                    Activities You Can Add To This Tour
                                </h3>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @foreach($trip->activities as $act)
                                    <x-activity-card :activity="$act" />
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right Sticky Booking Card (4 cols) -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-3xl p-8 border border-sand-200 shadow-xl sticky top-28 space-y-6">
                        <div>
                            <span class="text-xs text-sand-500 uppercase tracking-wider block font-medium">Tour Price</span>
                            <div class="mt-1 flex items-baseline gap-2">
                                <span class="font-display text-3xl font-extrabold text-forest-900">
                                    {{ $trip->formatted_price }}
                                </span>
                            </div>
                            @if($trip->price_label)
                                <span class="text-xs text-emerald-700 font-semibold block mt-0.5">
                                    {{ $trip->price_label }}
                                </span>
                            @endif
                        </div>

                        <!-- Tour Fast Facts -->
                        <div class="space-y-3 pt-4 border-t border-sand-100 text-sm">
                            <div class="flex items-center justify-between pb-2 border-b border-sand-100">
                                <span class="text-sand-500 font-medium">Duration:</span>
                                <span class="font-bold text-forest-900">{{ $trip->duration ?: 'Full Day (10 Hours)' }}</span>
                            </div>
                            <div class="flex items-center justify-between pb-2 border-b border-sand-100">
                                <span class="text-sand-500 font-medium">Area:</span>
                                <span class="font-bold text-forest-900 text-right">{{ $trip->location ?: 'Bali' }}</span>
                            </div>
                            <div class="flex items-center justify-between pb-2 border-b border-sand-100">
                                <span class="text-sand-500 font-medium">Vehicle:</span>
                                <span class="font-bold text-forest-900">{{ $recommendedVehicle ? $recommendedVehicle->name : 'Private Car' }}</span>
                            </div>
                            <div class="flex items-center justify-between pb-2 border-b border-sand-100">
                                <span class="text-sand-500 font-medium">Hotel Pickup:</span>
                                <span class="font-bold text-emerald-700">Included (Villa/Hotel)</span>
                            </div>
                        </div>

                        <!-- Direct WhatsApp Booking CTA Button -->
                        <div class="space-y-3 pt-2">
                            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer"
                               class="w-full flex items-center justify-center gap-3 px-6 py-4 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-base shadow-lg shadow-emerald-950/20 transition-all transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                                </svg>
                                <span>Inquire About This Tour on WhatsApp</span>
                            </a>
                            <p class="text-center text-[11px] text-sand-500">
                                Direct WhatsApp inquiry • Route consultation & planning
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Trips -->
    @if($relatedTrips->isNotEmpty())
        <section class="py-16 bg-cream-200/50 border-t border-sand-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <x-section-heading 
                    badge="More Suggestions"
                    title="Other Popular Bali Tours"
                    subtitle="Explore other parts of Bali with our trusted private driver team."
                />

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedTrips as $rTrip)
                        <x-trip-card :trip="$rTrip" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
