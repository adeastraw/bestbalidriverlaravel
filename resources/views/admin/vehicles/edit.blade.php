@extends('layouts.admin')

@section('title', 'Edit Vehicle — ' . $vehicle->name)
@section('header_title', 'Edit Fleet Vehicle')

@section('content')
    <div class="max-w-3xl space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Edit: {{ $vehicle->name }}</h1>
            <a href="{{ route('admin.vehicles.index') }}" class="text-xs font-semibold text-sand-600 hover:underline">
                ← Back to Fleet List
            </a>
        </div>

        <form action="{{ route('admin.vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Vehicle Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $vehicle->name) }}" required 
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="type" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Type / Category</label>
                    <input type="text" name="type" id="type" value="{{ old('type', $vehicle->type) }}" 
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="capacity" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Passenger Seats (Max) *</label>
                    <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $vehicle->capacity) }}" required min="1" max="60"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="luggage_capacity" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Luggage Capacity (Suitcases)</label>
                    <input type="number" name="luggage_capacity" id="luggage_capacity" value="{{ old('luggage_capacity', $vehicle->luggage_capacity) }}" min="0" max="40"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>
            </div>

            <!-- Main Photo -->
            <div class="flex items-center gap-4">
                <img src="{{ $vehicle->photo_url }}" alt="{{ $vehicle->name }}" class="w-20 h-14 rounded-lg object-cover border border-sand-200">
                <div class="flex-grow">
                    <label for="photo" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Change Main Photo</label>
                    <input type="file" name="photo" id="photo" accept="image/*"
                           class="w-full text-xs text-sand-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-forest-100 file:text-forest-800 hover:file:bg-forest-200">
                </div>
            </div>

            <!-- Existing Gallery Photos & Upload more -->
            <div>
                <label class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-2">Current Gallery Images</label>
                <div class="flex flex-wrap gap-4 mb-4">
                    @forelse($vehicle->images as $img)
                        <div class="relative w-24 h-20 rounded-xl overflow-hidden border border-sand-300 group">
                            <img src="{{ $img->image_url }}" alt="Gallery" class="w-full h-full object-cover">
                            <form action="{{ route('admin.vehicles.images.delete', $img->id) }}" method="POST" class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity" onsubmit="return confirm('Delete this gallery photo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-rose-300 hover:text-white font-bold bg-rose-600 px-2 py-1 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @empty
                        <span class="text-xs text-sand-500">No additional gallery photos yet.</span>
                    @endforelse
                </div>

                <label for="gallery_images" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Add More Gallery Photos</label>
                <input type="file" name="gallery_images[]" id="gallery_images" multiple accept="image/*"
                       class="w-full text-xs text-sand-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-forest-100 file:text-forest-800 hover:file:bg-forest-200">
            </div>

            <div>
                <label for="facilities" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Facilities & Features (One per line)</label>
                <textarea name="facilities" id="facilities" rows="4"
                          class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ old('facilities', $vehicle->facilities) }}</textarea>
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Description</label>
                <textarea name="description" id="description" rows="4" 
                          class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ old('description', $vehicle->description) }}</textarea>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-sm text-sand-800">
                    <input type="checkbox" name="status" value="1" {{ old('status', $vehicle->status) ? 'checked' : '' }}
                           class="rounded text-emerald-600 focus:ring-emerald-500 border-sand-300">
                    <span class="font-semibold">Active & Visible on Website</span>
                </label>

                <div class="flex items-center gap-2">
                    <label for="sort_order" class="text-xs font-bold text-sand-700 uppercase">Sort Order:</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $vehicle->sort_order) }}" class="w-20 rounded-xl border-sand-300 text-sm">
                </div>
            </div>

            <div class="pt-4 border-t border-sand-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.vehicles.index') }}" class="px-5 py-2.5 rounded-xl bg-sand-100 hover:bg-sand-200 text-sand-800 text-xs font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-semibold shadow-md">
                    Update Vehicle
                </button>
            </div>
        </form>
    </div>
@endsection
