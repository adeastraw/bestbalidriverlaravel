@extends('layouts.app')

@section('title', $activity->name . ' — Bali Tour Activity & Transport | ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', Str::limit($activity->short_description ?: $activity->description, 150))
@section('og_image', $activity->image_url)
@section('canonical', route('activities.show', $activity->slug))

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
          "name": "Activities",
          "item": "{{ route('activities.index') }}"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ $activity->name }}",
          "item": "{{ route('activities.show', $activity->slug) }}"
        }
      ]
    },
    {
      "@type": "TouristAttraction",
      "@id": "{{ route('activities.show', $activity->slug) }}/#attraction",
      "name": "{{ $activity->name }}",
      "description": "{{ addslashes(Str::limit($activity->short_description ?: $activity->description, 250)) }}",
      "image": "{{ $activity->image_url }}",
      "touristType": "International Tourists",
      "provider": {
        "@id": "{{ rtrim(config('app.url', 'https://bestbalidriver.site'), '/') }}/#agency"
      }
      @if($activity->price)
      ,"offers": {
        "@type": "Offer",
        "price": "{{ $activity->price }}",
        "priceCurrency": "IDR",
        "availability": "https://schema.org/InStock",
        "url": "{{ route('activities.show', $activity->slug) }}"
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
            <a href="{{ route('activities.index') }}" class="hover:text-forest-900 transition-colors">Activities</a>
            <span>/</span>
            <span class="text-forest-900 font-semibold truncate">{{ $activity->name }}</span>
        </div>
    </div>

    <!-- Activity Hero -->
    <div class="relative min-h-[45vh] sm:min-h-[50vh] flex items-end bg-forest-950 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ $activity->image_url }}" alt="{{ $activity->name }} - Bali Adventure Experience" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/20"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 pt-28 text-white w-full">
            <div class="flex flex-wrap gap-2 mb-3">
                @if($activity->location)
                    <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-sm text-cream-200 text-xs font-medium flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $activity->location }}
                    </span>
                @endif
                @if($activity->duration)
                    <span class="px-3 py-1 rounded-full bg-black/60 backdrop-blur-sm text-cream-200 text-xs font-medium flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $activity->duration }}
                    </span>
                @endif
            </div>

            <h1 class="font-display text-3xl sm:text-5xl font-extrabold text-white max-w-4xl leading-tight">
                {{ $activity->name }}
            </h1>
        </div>
    </div>

    <!-- Main Content Section -->
    <section class="py-14 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Left Details (8 cols) -->
                <div class="lg:col-span-8 space-y-10">
                    <!-- Overview -->
                    <div class="bg-white rounded-3xl p-8 border border-sand-200 shadow-sm space-y-4">
                        <h2 class="font-display text-2xl font-bold text-forest-900">
                            Activity Details
                        </h2>
                        <div class="prose max-w-none text-sand-800 text-sm sm:text-base leading-relaxed space-y-4">
                            {!! nl2br(e($activity->description ?: $activity->short_description)) !!}
                        </div>
                    </div>

                    <!-- What to Bring & Practical Info -->
                    <div class="bg-white rounded-3xl p-8 border border-sand-200 shadow-sm space-y-5">
                        <h3 class="font-display text-2xl font-bold text-forest-900">
                            Preparation & Important Notes
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-sand-800">
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-cream-100">
                                <span class="text-emerald-700 font-bold">✓</span>
                                <div>
                                    <strong class="text-forest-900 block font-semibold">What to bring</strong>
                                    <span>Sunscreen, change of clothes, camera, waterproof pouch, and walking shoes.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-cream-100">
                                <span class="text-emerald-700 font-bold">✓</span>
                                <div>
                                    <strong class="text-forest-900 block font-semibold">Safety equipment</strong>
                                    <span>Certified helmets, life vests, and professional guides are included.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-cream-100">
                                <span class="text-emerald-700 font-bold">✓</span>
                                <div>
                                    <strong class="text-forest-900 block font-semibold">Private driver transfer</strong>
                                    <span>Can be seamlessly combined with full-day sightseeing tours.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-cream-100">
                                <span class="text-emerald-700 font-bold">✓</span>
                                <div>
                                    <strong class="text-forest-900 block font-semibold">Insurance & facilities</strong>
                                    <span>Locker, changing room, and shower amenities on-site.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Tours -->
                    @if($relatedTrips->isNotEmpty())
                        <div class="space-y-6 pt-4">
                            <div>
                                <span class="text-xs uppercase tracking-wider text-emerald-700 font-bold block mb-1">
                                    Day Tour Combinations
                                </span>
                                <h3 class="font-display text-2xl font-bold text-forest-900">
                                    Combine with These Bali Tours
                                </h3>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @foreach($relatedTrips as $trip)
                                    <x-trip-card :trip="$trip" />
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right Sticky Card (4 cols) -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-3xl p-8 border border-sand-200 shadow-xl sticky top-28 space-y-6">
                        <div>
                            <span class="text-xs text-sand-500 uppercase tracking-wider block font-medium">Activity Rate</span>
                            <div class="mt-1 flex items-baseline gap-2">
                                <span class="font-display text-3xl font-extrabold text-forest-900">
                                    {{ $activity->formatted_price }}
                                </span>
                            </div>
                            @if($activity->price_label)
                                <span class="text-xs text-emerald-700 font-semibold block mt-0.5">
                                    {{ $activity->price_label }}
                                </span>
                            @endif
                        </div>

                        <!-- Activity Fast Facts -->
                        <div class="space-y-3 pt-4 border-t border-sand-100 text-sm">
                            <div class="flex items-center justify-between pb-2 border-b border-sand-100">
                                <span class="text-sand-500 font-medium">Duration:</span>
                                <span class="font-bold text-forest-900">{{ $activity->duration ?: '2 - 3 Hours' }}</span>
                            </div>
                            <div class="flex items-center justify-between pb-2 border-b border-sand-100">
                                <span class="text-sand-500 font-medium">Location:</span>
                                <span class="font-bold text-forest-900 text-right">{{ $activity->location ?: 'Bali' }}</span>
                            </div>
                            <div class="flex items-center justify-between pb-2 border-b border-sand-100">
                                <span class="text-sand-500 font-medium">Instructor:</span>
                                <span class="font-bold text-emerald-700">Certified Local Guide</span>
                            </div>
                        </div>

                        <!-- Direct WhatsApp CTA Button -->
                        <div class="pt-2">
                            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer"
                               class="w-full flex items-center justify-center gap-3 px-6 py-4 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-base shadow-lg transition-all transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                                </svg>
                                <span>Inquire on WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
