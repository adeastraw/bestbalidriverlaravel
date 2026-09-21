<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', setting('business_name', 'Best Bali Driver') . ' — Private Driver & Bali Tours')</title>
    <meta name="description" content="@yield('meta_description', 'Discover Bali with a trusted local private driver. Customized day tours, comfortable vehicles, island activities, and direct WhatsApp booking.')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', setting('business_name', 'Best Bali Driver'))">
    <meta property="og:description" content="@yield('meta_description', 'Discover Bali with a trusted local private driver.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/og-bali.jpg'))">
    <meta property="og:site_name" content="{{ setting('business_name', 'Best Bali Driver') }}">

    <!-- Structured Data Schema.org -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "TravelAgency",
      "name": "{{ setting('business_name', 'Best Bali Driver') }}",
      "image": "https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1200&q=80",
      "description": "{{ setting('tagline', 'Private Driver & Authentic Bali Tours') }}",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "{{ setting('address', 'Ubud, Gianyar') }}",
        "addressLocality": "Gianyar",
        "addressRegion": "Bali",
        "postalCode": "80571",
        "addressCountry": "ID"
      },
      "telephone": "{{ setting('whatsapp_number', '+6281234567890') }}",
      "openingHours": "Mo-Su 07:00-22:00",
      "priceRange": "$$"
    }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream-100 text-sand-900 flex flex-col min-h-screen">
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
