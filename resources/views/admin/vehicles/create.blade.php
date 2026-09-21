@extends('layouts.admin')

@section('title', 'Add New Vehicle')
@section('header_title', 'Register Fleet Vehicle')

@section('content')
    <div class="max-w-3xl space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Add Vehicle to Fleet</h1>
            <a href="{{ route('admin.vehicles.index') }}" class="text-xs font-semibold text-sand-600 hover:underline">
                ← Back to Fleet List
            </a>
        </div>

        <form action="{{ route('admin.vehicles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Vehicle Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="e.g. Toyota Innova Reborn"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="type" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Type / Category</label>
                    <input type="text" name="type" id="type" value="{{ old('type') }}" placeholder="e.g. Premium MPV, Minibus"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="capacity" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Passenger Seats (Max) *</label>
                    <input type="number" name="capacity" id="capacity" value="{{ old('capacity', 6) }}" required min="1" max="60"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="luggage_capacity" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Luggage Capacity (Suitcases)</label>
                    <input type="number" name="luggage_capacity" id="luggage_capacity" value="{{ old('luggage_capacity', 2) }}" min="0" max="40"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>
            </div>

            <div>
                <label for="photo" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Main Vehicle Photo (Upload Image)</label>
                <input type="file" name="photo" id="photo" accept="image/*"
                       class="w-full text-xs text-sand-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-forest-100 file:text-forest-800 hover:file:bg-forest-200">
            </div>

            <div>
                <label for="gallery_images" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Additional Gallery Photos (Multiple Allowed)</label>
                <input type="file" name="gallery_images[]" id="gallery_images" multiple accept="image/*"
                       class="w-full text-xs text-sand-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-forest-100 file:text-forest-800 hover:file:bg-forest-200">
            </div>

            <div>
                <label for="facilities" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Facilities & Features (One per line)</label>
                <textarea name="facilities" id="facilities" rows="4" placeholder="High AC&#10;Comfortable Seats&#10;USB Charging&#10;Mineral Water"
                          class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ old('facilities') }}</textarea>
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Description</label>
                <textarea name="description" id="description" rows="4" 
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
                <a href="{{ route('admin.vehicles.index') }}" class="px-5 py-2.5 rounded-xl bg-sand-100 hover:bg-sand-200 text-sand-800 text-xs font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-semibold shadow-md">
                    Register Vehicle
                </button>
            </div>
        </form>
    </div>
@endsection
