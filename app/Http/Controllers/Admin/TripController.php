<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Driver;
use App\Models\Trip;
use App\Models\TripDestination;
use App\Models\TripInclusion;
use App\Models\TripItinerary;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TripController extends Controller
{
    public function index(): View
    {
        $trips = Trip::withCount(['destinations', 'itineraries'])->orderBy('sort_order', 'asc')->paginate(15);
        return view('admin.trips.index', compact('trips'));
    }

    public function create(): View
    {
        $activities = Activity::where('status', true)->get();
        $vehicles = Vehicle::where('status', true)->get();
        $drivers = Driver::where('status', true)->get();

        return view('admin.trips.create', compact('activities', 'vehicles', 'drivers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:trips,slug',
            'category' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:4096',
            'status' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'activities' => 'nullable|array',
            'vehicles' => 'nullable|array',
            'drivers' => 'nullable|array',
            // Destinations
            'destinations' => 'nullable|array',
            'destinations.*.name' => 'nullable|string|max:255',
            'destinations.*.description' => 'nullable|string',
            // Itineraries
            'itineraries' => 'nullable|array',
            'itineraries.*.time_label' => 'nullable|string|max:50',
            'itineraries.*.title' => 'nullable|string|max:255',
            'itineraries.*.description' => 'nullable|string',
            // Inclusions
            'inclusions' => 'nullable|array',
            'inclusions.*.type' => 'nullable|in:included,not_included',
            'inclusions.*.description' => 'nullable|string',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $validated['status'] = $request->has('status');
        $validated['featured'] = $request->has('featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')->store('trips', 'public');
            $validated['hero_image'] = $path;
        }

        $trip = Trip::create($validated);

        if (!empty($validated['activities'])) {
            $trip->activities()->sync($validated['activities']);
        }
        if (!empty($validated['vehicles'])) {
            $trip->vehicles()->sync($validated['vehicles']);
        }
        if (!empty($validated['drivers'])) {
            $trip->drivers()->sync($validated['drivers']);
        }

        // Save destinations
        if (!empty($request->input('destinations'))) {
            $order = 1;
            foreach ($request->input('destinations') as $dest) {
                if (!empty($dest['name'])) {
                    TripDestination::create([
                        'trip_id' => $trip->id,
                        'name' => $dest['name'],
                        'description' => $dest['description'] ?? null,
                        'sort_order' => $order++,
                    ]);
                }
            }
        }

        // Save itineraries
        if (!empty($request->input('itineraries'))) {
            $order = 1;
            foreach ($request->input('itineraries') as $itin) {
                if (!empty($itin['title'])) {
                    TripItinerary::create([
                        'trip_id' => $trip->id,
                        'time_label' => $itin['time_label'] ?? null,
                        'title' => $itin['title'],
                        'description' => $itin['description'] ?? null,
                        'sort_order' => $order++,
                    ]);
                }
            }
        }

        // Save inclusions
        if (!empty($request->input('inclusions'))) {
            $order = 1;
            foreach ($request->input('inclusions') as $inc) {
                if (!empty($inc['description'])) {
                    TripInclusion::create([
                        'trip_id' => $trip->id,
                        'type' => $inc['type'] ?? 'included',
                        'description' => $inc['description'],
                        'sort_order' => $order++,
                    ]);
                }
            }
        }

        return redirect()->route('admin.trips.index')->with('success', 'Tour itinerary created successfully.');
    }

    public function edit(Trip $trip): View
    {
        $trip->load(['destinations', 'itineraries', 'inclusions', 'activities', 'vehicles', 'drivers']);
        $activities = Activity::where('status', true)->get();
        $vehicles = Vehicle::where('status', true)->get();
        $drivers = Driver::where('status', true)->get();

        return view('admin.trips.edit', compact('trip', 'activities', 'vehicles', 'drivers'));
    }

    public function update(Request $request, Trip $trip): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:trips,slug,' . $trip->id,
            'category' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:4096',
            'status' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'activities' => 'nullable|array',
            'vehicles' => 'nullable|array',
            'drivers' => 'nullable|array',
            'destinations' => 'nullable|array',
            'destinations.*.name' => 'nullable|string|max:255',
            'destinations.*.description' => 'nullable|string',
            'itineraries' => 'nullable|array',
            'itineraries.*.time_label' => 'nullable|string|max:50',
            'itineraries.*.title' => 'nullable|string|max:255',
            'itineraries.*.description' => 'nullable|string',
            'inclusions' => 'nullable|array',
            'inclusions.*.type' => 'nullable|in:included,not_included',
            'inclusions.*.description' => 'nullable|string',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $validated['status'] = $request->has('status');
        $validated['featured'] = $request->has('featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('hero_image')) {
            if ($trip->hero_image && !str_starts_with($trip->hero_image, 'http')) {
                Storage::disk('public')->delete($trip->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('trips', 'public');
        }

        $trip->update($validated);

        $trip->activities()->sync($request->input('activities', []));
        $trip->vehicles()->sync($request->input('vehicles', []));
        $trip->drivers()->sync($request->input('drivers', []));

        // Sync destinations
        TripDestination::where('trip_id', $trip->id)->delete();
        if (!empty($request->input('destinations'))) {
            $order = 1;
            foreach ($request->input('destinations') as $dest) {
                if (!empty($dest['name'])) {
                    TripDestination::create([
                        'trip_id' => $trip->id,
                        'name' => $dest['name'],
                        'description' => $dest['description'] ?? null,
                        'sort_order' => $order++,
                    ]);
                }
            }
        }

        // Sync itineraries
        TripItinerary::where('trip_id', $trip->id)->delete();
        if (!empty($request->input('itineraries'))) {
            $order = 1;
            foreach ($request->input('itineraries') as $itin) {
                if (!empty($itin['title'])) {
                    TripItinerary::create([
                        'trip_id' => $trip->id,
                        'time_label' => $itin['time_label'] ?? null,
                        'title' => $itin['title'],
                        'description' => $itin['description'] ?? null,
                        'sort_order' => $order++,
                    ]);
                }
            }
        }

        // Sync inclusions
        TripInclusion::where('trip_id', $trip->id)->delete();
        if (!empty($request->input('inclusions'))) {
            $order = 1;
            foreach ($request->input('inclusions') as $inc) {
                if (!empty($inc['description'])) {
                    TripInclusion::create([
                        'trip_id' => $trip->id,
                        'type' => $inc['type'] ?? 'included',
                        'description' => $inc['description'],
                        'sort_order' => $order++,
                    ]);
                }
            }
        }

        return redirect()->route('admin.trips.index')->with('success', 'Trip updated successfully.');
    }

    public function destroy(Trip $trip): RedirectResponse
    {
        if ($trip->hero_image && !str_starts_with($trip->hero_image, 'http')) {
            Storage::disk('public')->delete($trip->hero_image);
        }
        $trip->delete();

        return redirect()->route('admin.trips.index')->with('success', 'Trip deleted successfully.');
    }
}
