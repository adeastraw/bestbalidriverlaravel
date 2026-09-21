@extends('layouts.admin')

@section('title', 'Add New Activity')
@section('header_title', 'Create Tourist Activity')

@section('content')
    <div class="max-w-3xl space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Add New Activity</h1>
            <a href="{{ route('admin.activities.index') }}" class="text-xs font-semibold text-sand-600 hover:underline">
                ← Back to Activities List
            </a>
        </div>

        <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Activity Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="e.g. Ayung River White Water Rafting"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="location" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Location</label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder="e.g. Ubud, Gianyar"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="duration" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Duration</label>
                    <input type="text" name="duration" id="duration" value="{{ old('duration', '2.5 Hours') }}" placeholder="e.g. 2 Hours, Half Day"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="price" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Price (IDR) (Leave empty for 'Contact Us')</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="e.g. 450000"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="price_label" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Price Label Note</label>
                    <input type="text" name="price_label" id="price_label" value="{{ old('price_label', 'per person') }}" placeholder="e.g. per person"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>
            </div>

            <div>
                <label for="image" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Activity Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full text-xs text-sand-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-forest-100 file:text-forest-800 hover:file:bg-forest-200">
            </div>

            <div>
                <label for="short_description" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Short Summary</label>
                <input type="text" name="short_description" id="short_description" value="{{ old('short_description') }}" placeholder="1-2 sentences overview"
                       class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Detailed Description & Preparation Notes</label>
                <textarea name="description" id="description" rows="5" 
                          class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ old('description') }}</textarea>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-sm text-sand-800">
                    <input type="checkbox" name="status" value="1" {{ old('status', true) ? 'checked' : '' }}
                           class="rounded text-emerald-600 focus:ring-emerald-500 border-sand-300">
                    <span class="font-semibold">Active & Visible</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer text-sm text-sand-800">
                    <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                           class="rounded text-amber-500 focus:ring-amber-400 border-sand-300">
                    <span class="font-semibold text-amber-800">Featured on Homepage</span>
                </label>

                <div class="flex items-center gap-2">
                    <label for="sort_order" class="text-xs font-bold text-sand-700 uppercase">Sort Order:</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="w-20 rounded-xl border-sand-300 text-sm">
                </div>
            </div>

            <div class="pt-4 border-t border-sand-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.activities.index') }}" class="px-5 py-2.5 rounded-xl bg-sand-100 hover:bg-sand-200 text-sand-800 text-xs font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-semibold shadow-md">
                    Save Activity
                </button>
            </div>
        </form>
    </div>
@endsection
