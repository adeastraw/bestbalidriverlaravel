@extends('layouts.admin')

@section('title', 'Edit Tour — ' . $trip->name)
@section('header_title', 'Edit Tour Package')

@section('content')
    <div class="max-w-4xl space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Edit: {{ $trip->name }}</h1>
            <a href="{{ route('admin.trips.index') }}" class="text-xs font-semibold text-sand-600 hover:underline">
                ← Back to Tours List
            </a>
        </div>

        <form action="{{ route('admin.trips.update', $trip->id) }}" method="POST" enctype="multipart/form-data" 
              x-data="{
                  destinations: {{ json_encode($trip->destinations->isNotEmpty() ? $trip->destinations->map(fn($d) => ['name' => $d->name, 'description' => $d->description]) : [['name' => '', 'description' => '']]) }},
                  itineraries: {{ json_encode($trip->itineraries->isNotEmpty() ? $trip->itineraries->map(fn($i) => ['time_label' => $i->time_label, 'title' => $i->title, 'description' => $i->description]) : [['time_label' => '', 'title' => '', 'description' => '']]) }},
                  inclusions: {{ json_encode($trip->inclusions->isNotEmpty() ? $trip->inclusions->map(fn($inc) => ['type' => $inc->type, 'description' => $inc->description]) : [['type' => 'included', 'description' => '']]) }}
              }" 
              class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Section 1: Basic Tour Info -->
            <div class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-6">
                <h3 class="font-display text-lg font-bold text-forest-900 border-b border-sand-100 pb-3">
                    1. General Information
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Tour Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $trip->name) }}" required 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div>
                        <label for="category" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Category</label>
                        <input type="text" name="category" id="category" value="{{ old('category', $trip->category) }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div>
                        <label for="location" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Area / Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location', $trip->location) }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div>
                        <label for="duration" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Duration</label>
                        <input type="text" name="duration" id="duration" value="{{ old('duration', $trip->duration) }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div>
                        <label for="price" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Price (IDR) (Leave blank for 'Contact Us')</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $trip->price) }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="price_label" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Price Label Note</label>
                        <input type="text" name="price_label" id="price_label" value="{{ old('price_label', $trip->price_label) }}" 
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <img src="{{ $trip->hero_image_url }}" alt="{{ $trip->name }}" class="w-24 h-16 rounded-xl object-cover border border-sand-200">
                    <div class="flex-grow">
                        <label for="hero_image" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Change Hero Banner Photo</label>
                        <input type="file" name="hero_image" id="hero_image" accept="image/*"
                               class="w-full text-xs text-sand-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-forest-100 file:text-forest-800 hover:file:bg-forest-200">
                    </div>
                </div>

                <div>
                    <label for="short_description" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Short Description (Card Teaser)</label>
                    <input type="text" name="short_description" id="short_description" value="{{ old('short_description', $trip->short_description) }}" 
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="description" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Full Tour Description</label>
                    <textarea name="description" id="description" rows="5" 
                              class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ old('description', $trip->description) }}</textarea>
                </div>

                <div class="flex flex-wrap items-center gap-6 pt-2">
                    <label class="flex items-center gap-2 cursor-pointer text-sm text-sand-800">
                        <input type="checkbox" name="status" value="1" {{ old('status', $trip->status) ? 'checked' : '' }}
                               class="rounded text-emerald-600 focus:ring-emerald-500 border-sand-300">
                        <span class="font-semibold">Published & Active</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer text-sm text-sand-800">
                        <input type="checkbox" name="featured" value="1" {{ old('featured', $trip->featured) ? 'checked' : '' }}
                               class="rounded text-amber-500 focus:ring-amber-400 border-sand-300">
                        <span class="font-semibold text-amber-800">Feature on Homepage</span>
                    </label>

                    <div class="flex items-center gap-2">
                        <label for="sort_order" class="text-xs font-bold text-sand-700 uppercase">Sort Order:</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $trip->sort_order) }}" class="w-20 rounded-xl border-sand-300 text-sm">
                    </div>
                </div>
            </div>

            <!-- Section 2: Destinations -->
            <div class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-sand-100 pb-3">
                    <h3 class="font-display text-lg font-bold text-forest-900">
                        2. Destination Stops
                    </h3>
                    <button type="button" @click="destinations.push({ name: '', description: '' })" 
                            class="text-xs font-semibold text-emerald-700 hover:text-emerald-900 bg-emerald-50 px-3 py-1.5 rounded-lg">
                        + Add Destination Stop
                    </button>
                </div>

                <template x-for="(dest, index) in destinations" :key="index">
                    <div class="p-4 rounded-xl bg-cream-50 border border-sand-200/80 space-y-3 relative">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-sand-600 uppercase" x-text="'Stop #' + (index + 1)"></span>
                            <button type="button" @click="destinations.splice(index, 1)" class="text-xs text-rose-600 hover:underline">
                                Remove
                            </button>
                        </div>
                        <input type="text" :name="'destinations[' + index + '][name]'" x-model="dest.name" placeholder="Attraction name"
                               class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                        <textarea :name="'destinations[' + index + '][description]'" x-model="dest.description" rows="2" placeholder="Brief description of this destination"
                                  class="w-full rounded-xl border-sand-300 text-xs focus:border-emerald-600 focus:ring-emerald-600"></textarea>
                    </div>
                </template>
            </div>

            <!-- Section 3: Timeline Itinerary -->
            <div class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-sand-100 pb-3">
                    <h3 class="font-display text-lg font-bold text-forest-900">
                        3. Itinerary Timeline
                    </h3>
                    <button type="button" @click="itineraries.push({ time_label: '', title: '', description: '' })" 
                            class="text-xs font-semibold text-emerald-700 hover:text-emerald-900 bg-emerald-50 px-3 py-1.5 rounded-lg">
                        + Add Timeline Step
                    </button>
                </div>

                <template x-for="(itin, index) in itineraries" :key="index">
                    <div class="p-4 rounded-xl bg-cream-50 border border-sand-200/80 space-y-3 relative">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-sand-600 uppercase" x-text="'Step #' + (index + 1)"></span>
                            <button type="button" @click="itineraries.splice(index, 1)" class="text-xs text-rose-600 hover:underline">
                                Remove
                            </button>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                            <div class="sm:col-span-1">
                                <input type="text" :name="'itineraries[' + index + '][time_label]'" x-model="itin.time_label" placeholder="e.g. 08:30 AM"
                                       class="w-full rounded-xl border-sand-300 text-xs">
                            </div>
                            <div class="sm:col-span-3">
                                <input type="text" :name="'itineraries[' + index + '][title]'" x-model="itin.title" placeholder="Step title"
                                       class="w-full rounded-xl border-sand-300 text-sm">
                            </div>
                        </div>
                        <input type="text" :name="'itineraries[' + index + '][description]'" x-model="itin.description" placeholder="Description of this activity step"
                               class="w-full rounded-xl border-sand-300 text-xs">
                    </div>
                </template>
            </div>

            <!-- Section 4: Inclusions and Exclusions -->
            <div class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-sand-100 pb-3">
                    <h3 class="font-display text-lg font-bold text-forest-900">
                        4. What's Included & Not Included
                    </h3>
                    <button type="button" @click="inclusions.push({ type: 'included', description: '' })" 
                            class="text-xs font-semibold text-emerald-700 hover:text-emerald-900 bg-emerald-50 px-3 py-1.5 rounded-lg">
                        + Add Inclusion Item
                    </button>
                </div>

                <template x-for="(inc, index) in inclusions" :key="index">
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-cream-50 border border-sand-200/80">
                        <select :name="'inclusions[' + index + '][type]'" x-model="inc.type" class="w-40 rounded-xl border-sand-300 text-xs font-bold">
                            <option value="included">✓ Included</option>
                            <option value="not_included">✕ Not Included</option>
                        </select>
                        <input type="text" :name="'inclusions[' + index + '][description]'" x-model="inc.description" placeholder="Description"
                               class="flex-grow rounded-xl border-sand-300 text-sm">
                        <button type="button" @click="inclusions.splice(index, 1)" class="text-xs text-rose-600 hover:underline px-2">
                            ×
                        </button>
                    </div>
                </template>
            </div>

            <!-- Submit buttons -->
            <div class="p-6 bg-white rounded-2xl border border-sand-200 shadow-sm flex items-center justify-end gap-3">
                <a href="{{ route('admin.trips.index') }}" class="px-5 py-2.5 rounded-xl bg-sand-100 hover:bg-sand-200 text-sand-800 text-xs font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-7 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-semibold shadow-md">
                    Update Tour Itinerary
                </button>
            </div>
        </form>
    </div>
@endsection
