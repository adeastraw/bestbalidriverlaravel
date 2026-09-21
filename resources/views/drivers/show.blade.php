@extends('layouts.app')

@section('title', $driver->name . ' — Licensed Private Driver in Bali | ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', $driver->name . ': ' . ($driver->short_bio ?: 'Licensed private driver in Bali.') . ' Inquire for custom tours, comfortable vehicles, and personalized itineraries.')
@section('og_image', $driver->photo_url)
@section('og_type', 'profile')
@section('canonical', route('drivers.show', $driver->slug))

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
          "name": "Drivers",
          "item": "{{ route('drivers.index') }}"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ $driver->name }}",
          "item": "{{ route('drivers.show', $driver->slug) }}"
        }
      ]
    },
    {
      "@type": "Person",
      "@id": "{{ route('drivers.show', $driver->slug) }}/#driver",
      "name": "{{ $driver->name }}",
      "jobTitle": "Licensed Private Driver & Bali Tour Guide",
      "image": "{{ $driver->photo_url }}",
      "description": "{{ addslashes(Str::limit($driver->short_bio ?: $driver->description, 200)) }}",
      "worksFor": {
        "@id": "{{ rtrim(config('app.url', 'https://bestbalidriver.site'), '/') }}/#agency"
      }
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
            <a href="{{ route('drivers.index') }}" class="hover:text-forest-900 transition-colors">Drivers</a>
            <span>/</span>
            <span class="text-forest-900 font-semibold truncate">{{ $driver->name }}</span>
        </div>
    </div>

    <!-- Driver Hero & Profile -->
    <section class="py-14 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Driver Photo & Quick Contact Card -->
                <div class="lg:col-span-4">
                    <div class="bg-white rounded-3xl overflow-hidden border border-sand-200 shadow-lg sticky top-28">
                        <div class="relative h-96 w-full bg-forest-950">
                            <img src="{{ $driver->photo_url }}" alt="{{ $driver->name }} - Balinese Private Driver" class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-6 right-6 text-white">
                                <span class="text-xs uppercase tracking-wider text-emerald-300 font-semibold block">Private Driver</span>
                                <h1 class="font-display text-2xl sm:text-3xl font-bold">{{ $driver->name }}</h1>
                            </div>
                        </div>

                        <div class="p-6 space-y-5">
                            <div class="space-y-3 text-sm">
                                <div class="flex items-center justify-between pb-3 border-b border-sand-100">
                                    <span class="text-sand-500 font-medium">Driving Experience:</span>
                                    <span class="font-bold text-forest-900">{{ $driver->experience ?: 'Experienced' }}</span>
                                </div>
                                <div class="flex items-center justify-between pb-3 border-b border-sand-100">
                                    <span class="text-sand-500 font-medium">Languages:</span>
                                    <span class="font-bold text-forest-900 text-right">{{ $driver->languages ?: 'English, Indonesian' }}</span>
                                </div>
                                <div class="flex items-start justify-between pb-3 border-b border-sand-100">
                                    <span class="text-sand-500 font-medium flex-shrink-0">Service Area:</span>
                                    <span class="font-medium text-forest-900 text-right text-xs">{{ $driver->service_area ?: 'All Bali' }}</span>
                                </div>
                            </div>

                            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer"
                               class="w-full flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-sm shadow-md transition-all">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.97.53 1.761.814 2.796.814 3.181 0 5.768-2.587 5.768-5.766 0-3.181-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.485-4.485 9.969-9.969 9.969-1.748 0-3.385-.45-4.819-1.238l-5.212 1.331 1.365-4.992c-.878-1.503-1.334-3.238-1.334-5.07 0-5.484 4.485-9.969 9.969-9.969s9.969 4.485 9.969 9.969z"/>
                                </svg>
                                <span>Request {{ explode(' ', $driver->name)[0] }} on WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Driver Biography and Related Information -->
                <div class="lg:col-span-8 space-y-10">
                    <!-- Biography Card -->
                    <div class="bg-white rounded-3xl p-8 border border-sand-200 shadow-sm space-y-5">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-forest-100 text-forest-800 text-xs font-semibold uppercase tracking-wider">
                            About The Driver
                        </span>
                        <h2 class="font-display text-2xl sm:text-3xl font-bold text-forest-900">
                            {{ $driver->short_bio ?: 'Professional Private Driver in Bali' }}
                        </h2>
                        
                        <div class="prose max-w-none text-sand-800 leading-relaxed text-sm sm:text-base space-y-4">
                            {!! nl2br(e($driver->description)) !!}
                        </div>
                    </div>

                    <!-- Available Fleet Vehicles -->
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <h3 class="font-display text-2xl font-bold text-forest-900">
                                Vehicles Driven by {{ explode(' ', $driver->name)[0] }}
                            </h3>
                            <a href="{{ route('vehicles.index') }}" class="text-xs font-semibold text-emerald-700 hover:underline">
                                View all fleet →
                            </a>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            @foreach($vehicles as $vehicle)
                                <x-vehicle-card :vehicle="$vehicle" />
                            @endforeach
                        </div>
                    </div>

                    <!-- Driver Reviews if any -->
                    @if($driver->reviews->isNotEmpty())
                        <div class="space-y-6 pt-4">
                            <h3 class="font-display text-2xl font-bold text-forest-900">
                                Reviews for {{ $driver->name }}
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($driver->reviews as $review)
                                    <x-review-card :review="$review" />
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
