@extends('layouts.app')

@section('title', 'Bali Day Tours & Private Sightseeing Trips — ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', 'Browse customizable private Bali day tours: Ubud cultural waterfalls, East Bali Lempuyang water palaces, Nusa Penida island tours, and scenic sunset trips.')
@section('canonical', route('trips.index'))
@if(request('q'))
    @section('robots', 'noindex, follow')
@endif

@section('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
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
      "name": "Bali Day Tours",
      "item": "{{ route('trips.index') }}"
    }
  ]
}
</script>
@endsection

@section('content')
    <!-- Banner Header -->
    <div class="relative bg-forest-950 py-16 text-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-forest-800 text-emerald-300 text-xs font-semibold uppercase tracking-wider mb-4">
                Tailored Bali Itineraries
            </span>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white mb-3">
                Bali Day Tours & Sightseeing Trips
            </h1>
            <p class="text-base sm:text-lg text-cream-200/90 max-w-2xl mx-auto font-light">
                Discover the island’s most captivating temples, volcanic viewpoints, tropical waterfalls, and coastal beaches at your own relaxed pace.
            </p>
        </div>
    </div>

    <!-- Filter Bar & Content -->
    <section class="py-12 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Bar -->
            <div class="bg-white rounded-2xl p-4 sm:p-6 border border-sand-200 shadow-sm mb-12">
                <form action="{{ route('trips.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 items-end">
                    <!-- Search Input -->
                    <div class="lg:col-span-4">
                        <label for="q" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1.5">Search Tours</label>
                        <input type="text" name="q" id="q" value="{{ request('q') }}" 
                               placeholder="e.g. Ubud, Waterfall, Sunset..." 
                               class="w-full rounded-xl border-sand-300 focus:border-emerald-600 focus:ring-emerald-600 text-sm">
                    </div>

                    <!-- Category Filter -->
                    <div class="lg:col-span-3">
                        <label for="category" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1.5">Category</label>
                        <select name="category" id="category" class="w-full rounded-xl border-sand-300 focus:border-emerald-600 focus:ring-emerald-600 text-sm">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Location Filter -->
                    <div class="lg:col-span-3">
                        <label for="location" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1.5">Area</label>
                        <select name="location" id="location" class="w-full rounded-xl border-sand-300 focus:border-emerald-600 focus:ring-emerald-600 text-sm">
                            <option value="">All Bali Areas</option>
                            @foreach($locations as $loc)
                                <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="lg:col-span-2 flex items-center gap-2">
                        <button type="submit" 
                                class="w-full py-2.5 px-4 bg-forest-900 hover:bg-forest-800 text-white rounded-xl text-sm font-semibold transition-colors">
                            Filter
                        </button>
                        @if(request()->hasAny(['q', 'category', 'location']))
                            <a href="{{ route('trips.index') }}" 
                               class="py-2.5 px-3 bg-cream-200 hover:bg-sand-200 text-forest-900 rounded-xl text-xs font-semibold transition-colors"
                               title="Reset filters">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Trips Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($trips as $trip)
                    <x-trip-card :trip="$trip" />
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-2xl border border-sand-200">
                        <h3 class="font-display text-xl font-bold text-forest-900 mb-2">No trips match your filter criteria.</h3>
                        <p class="text-sand-600 text-sm mb-6">Try clearing your filters or contact us to design a 100% custom itinerary for your trip.</p>
                        <div class="flex items-center justify-center gap-4">
                            <a href="{{ route('trips.index') }}" class="px-5 py-2.5 rounded-xl bg-sand-200 text-forest-900 text-xs font-semibold">
                                Clear Filters
                            </a>
                            <a href="{{ whatsapp_url() }}" target="_blank" rel="noopener noreferrer" 
                               class="px-5 py-2.5 rounded-xl bg-emerald-600 text-white text-xs font-semibold">
                                Request Custom Tour via WhatsApp
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $trips->links() }}
            </div>
        </div>
    </section>
@endsection
