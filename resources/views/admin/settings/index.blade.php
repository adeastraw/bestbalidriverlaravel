@extends('layouts.admin')

@section('title', 'Site Settings')
@section('header_title', 'Business & Website Settings')

@section('content')
    <div class="max-w-4xl space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Website Configuration</h1>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-8">
            @csrf

            <!-- Section 1: Business Identity & Contact -->
            <div class="space-y-5">
                <h3 class="font-display text-lg font-bold text-forest-900 border-b border-sand-100 pb-2">
                    1. Contact & Social Channels
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="business_name" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Business Name</label>
                        <input type="text" name="business_name" id="business_name" value="{{ $settings['business_name'] ?? 'Best Bali Driver' }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div>
                        <label for="whatsapp_number" class="block text-xs font-bold text-emerald-800 uppercase tracking-wider mb-1">Primary WhatsApp Number *</label>
                        <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{ $settings['whatsapp_number'] ?? '6281234567890' }}" required 
                               placeholder="e.g. 6281234567890"
                               class="w-full rounded-xl border-emerald-400 text-sm focus:border-emerald-600 focus:ring-emerald-600 font-semibold text-emerald-900">
                        <span class="text-[11px] text-sand-500 block mt-1">Format: Country code without + (e.g. 6281234567890)</span>
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Contact Email</label>
                        <input type="email" name="email" id="email" value="{{ $settings['email'] ?? 'info@bestbalidriver.com' }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div>
                        <label for="instagram_url" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Instagram Profile URL</label>
                        <input type="url" name="instagram_url" id="instagram_url" value="{{ $settings['instagram_url'] ?? 'https://instagram.com/bestbalidriver' }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="address" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Physical Base / Office Address</label>
                        <input type="text" name="address" id="address" value="{{ $settings['address'] ?? 'Jl. Raya Pengosekan, Ubud, Gianyar, Bali - Indonesia' }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="business_hours" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Business Hours</label>
                        <input type="text" name="business_hours" id="business_hours" value="{{ $settings['business_hours'] ?? 'Daily: 07:00 AM - 10:00 PM WITA' }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>
                </div>
            </div>

            <!-- Section 2: Homepage & About Texts -->
            <div class="space-y-5">
                <h3 class="font-display text-lg font-bold text-forest-900 border-b border-sand-100 pb-2">
                    2. Tagline & Website Story Texts
                </h3>

                <div class="space-y-4">
                    <div>
                        <label for="tagline" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Brand Tagline</label>
                        <input type="text" name="tagline" id="tagline" value="{{ $settings['tagline'] ?? 'Private Driver & Authentic Bali Tours' }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="hero_title" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Hero Main Title</label>
                            <input type="text" name="hero_title" id="hero_title" value="{{ $settings['hero_title'] ?? 'Explore Bali Your Way' }}" 
                                   class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                        </div>
                        <div>
                            <label for="hero_subtitle" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Hero Subtitle</label>
                            <input type="text" name="hero_subtitle" id="hero_subtitle" value="{{ $settings['hero_subtitle'] ?? 'Private Driver • Custom Tours • Local Experience' }}" 
                                   class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                        </div>
                    </div>

                    <div>
                        <label for="footer_text" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Footer Summary Paragraph</label>
                        <textarea name="footer_text" id="footer_text" rows="2" 
                                  class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ $settings['footer_text'] ?? '' }}</textarea>
                    </div>

                    <div>
                        <label for="about_story" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">About Us Company Story</label>
                        <textarea name="about_story" id="about_story" rows="4" 
                                  class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ $settings['about_story'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-sand-100 flex items-center justify-end">
                <button type="submit" class="px-7 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-semibold shadow-md">
                    Save Website Settings
                </button>
            </div>
        </form>
    </div>
@endsection
