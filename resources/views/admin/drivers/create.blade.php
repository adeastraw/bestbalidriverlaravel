@extends('layouts.admin')

@section('title', 'Add New Driver')
@section('header_title', 'Create Driver Profile')

@section('content')
    <div class="max-w-3xl space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Add New Driver</h1>
            <a href="{{ route('admin.drivers.index') }}" class="text-xs font-semibold text-sand-600 hover:underline">
                ← Back to Drivers List
            </a>
        </div>

        <form action="{{ route('admin.drivers.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Full Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="slug" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">URL Slug (Optional)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="e.g. wayan-sukadana"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="experience" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Experience</label>
                    <input type="text" name="experience" id="experience" value="{{ old('experience') }}" placeholder="e.g. 10+ Years"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="phone" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Phone / WhatsApp</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="+62 812-xxxx-xxxx"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="languages" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Languages Spoken</label>
                    <input type="text" name="languages" id="languages" value="{{ old('languages', 'English, Indonesian') }}"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="service_area" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Service Area</label>
                    <input type="text" name="service_area" id="service_area" value="{{ old('service_area', 'All Bali') }}"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>
            </div>

            <div>
                <label for="photo" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Profile Photo (Upload Image)</label>
                <input type="file" name="photo" id="photo" accept="image/*"
                       class="w-full text-xs text-sand-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-forest-100 file:text-forest-800 hover:file:bg-forest-200">
            </div>

            <div>
                <label for="short_bio" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Short Introduction Bio</label>
                <input type="text" name="short_bio" id="short_bio" value="{{ old('short_bio') }}" placeholder="1-2 sentences summarizing experience"
                       class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Full Biography / Story</label>
                <textarea name="description" id="description" rows="5" 
                          class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ old('description') }}</textarea>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-sm text-sand-800">
                    <input type="checkbox" name="status" value="1" {{ old('status', true) ? 'checked' : '' }}
                           class="rounded text-emerald-600 focus:ring-emerald-500 border-sand-300">
                    <span class="font-semibold">Active & Visible on Website</span>
                </label>

                <div class="flex items-center gap-2">
                    <label for="sort_order" class="text-xs font-bold text-sand-700 uppercase">Sort Order:</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="w-20 rounded-xl border-sand-300 text-sm">
                </div>
            </div>

            <div class="pt-4 border-t border-sand-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.drivers.index') }}" class="px-5 py-2.5 rounded-xl bg-sand-100 hover:bg-sand-200 text-sand-800 text-xs font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-semibold shadow-md">
                    Save Driver Profile
                </button>
            </div>
        </form>
    </div>
@endsection
