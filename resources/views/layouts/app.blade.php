<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', setting('business_name', 'Best Bali Driver') . ' — Private Driver & Bali Tours')</title>
    <meta name="description" content="@yield('meta_description', 'Discover Bali with a trusted local private driver. Customized day tours, comfortable vehicles, island activities, and direct WhatsApp consultation.')">
    <meta name="robots" content="@yield('robots', 'index, follow, max-image-preview:large')">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Favicons -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">

    <!-- Open Graph -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('title', setting('business_name', 'Best Bali Driver'))">
    <meta property="og:description" content="@yield('meta_description', 'Discover Bali with a trusted local private driver.')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:image" content="@yield('og_image', asset('images/og-bali.jpg'))">
    <meta property="og:site_name" content="{{ setting('business_name', 'Best Bali Driver') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', setting('business_name', 'Best Bali Driver'))">
    <meta name="twitter:description" content="@yield('meta_description', 'Discover Bali with a trusted local private driver.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-bali.jpg'))">

    <!-- Base Schema.org TravelAgency -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "TravelAgency",
      "@id": "{{ rtrim(config('app.url', 'https://bestbalidriver.site'), '/') }}/#agency",
      "name": "{{ setting('business_name', 'Best Bali Driver') }}",
      "url": "{{ rtrim(config('app.url', 'https://bestbalidriver.site'), '/') }}",
      "image": "{{ asset('images/og-bali.jpg') }}",
      "description": "{{ setting('tagline', 'Private Driver & Authentic Bali Tours') }}",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "{{ setting('address', 'Ubud, Gianyar') }}",
        "addressLocality": "Gianyar",
        "addressRegion": "Bali",
        "postalCode": "80571",
        "addressCountry": "ID"
      },
      "areaServed": "Bali, Indonesia",
      "telephone": "{{ setting('whatsapp_number', '+6281234567890') }}",
      "openingHours": "Mo-Su 07:00-22:00",
      "priceRange": "$$"
    }
    </script>

    {{-- Contextual Page-Specific Structured Data --}}
    @yield('structured_data')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream-100 text-sand-900 flex flex-col min-h-screen">
    {{-- Premium Website Testing Notice --}}
    @include('components.testing-notice')

    {{-- Header / Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Floating WhatsApp Mobile Action --}}
    @include('components.floating-whatsapp')

    {{-- Footer --}}
    @include('components.footer')
</body>
</html>
