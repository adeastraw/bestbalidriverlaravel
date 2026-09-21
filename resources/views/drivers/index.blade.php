@extends('layouts.app')

@section('title', 'Meet Our Bali Drivers — ' . setting('business_name', 'Best Bali Driver'))
@section('meta_description', 'Meet our licensed, professional, and friendly Balinese private drivers. Experienced in safe island navigation, fluent in English, and ready to guide your journey.')
@section('canonical', route('drivers.index'))

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
      "name": "Our Drivers",
      "item": "{{ route('drivers.index') }}"
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
                Local Experience & Hospitality
            </span>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white mb-3">
                Our Private Bali Drivers
            </h1>
            <p class="text-base sm:text-lg text-cream-200/90 max-w-2xl mx-auto font-light">
                Professional, courteous, and seasoned drivers dedicated to giving you an unforgettable island adventure.
            </p>
        </div>
    </div>

    <!-- Drivers Listing Grid -->
    <section class="py-16 bg-cream-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($drivers as $driver)
                    <x-driver-card :driver="$driver" />
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-2xl border border-sand-200">
                        <p class="text-sand-600 text-base">No drivers are currently listed. Please check back soon or message us directly on WhatsApp.</p>
                        <div class="mt-4">
                            <a href="{{ whatsapp_url() }}" target="_blank" rel="noopener noreferrer" 
                               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-emerald-600 text-white font-semibold text-xs uppercase">
                                Inquire via WhatsApp
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
