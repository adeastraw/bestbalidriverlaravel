<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function index(): View
    {
        $vehicles = Vehicle::withCount('images')->orderBy('sort_order', 'asc')->paginate(15);
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create(): View
    {
        return view('admin.vehicles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:vehicles,slug',
            'type' => 'nullable|string|max:100',
            'capacity' => 'required|integer|min:1|max:60',
            'luggage_capacity' => 'nullable|integer|min:0|max:40',
            'description' => 'nullable|string',
            'facilities' => 'nullable|string',
            'photo' => 'nullable|image|max:3072',
            'gallery_images.*' => 'nullable|image|max:3072',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $validated['status'] = $request->has('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('vehicles', 'public');
            $validated['photo'] = $path;
        }

        $vehicle = Vehicle::create($validated);

        if ($request->hasFile('gallery_images')) {
            $order = 1;
            foreach ($request->file('gallery_images') as $file) {
                $imgPath = $file->store('vehicles/gallery', 'public');
                VehicleImage::create([
                    'vehicle_id' => $vehicle->id,
                    'image_path' => $imgPath,
                    'alt_text' => $vehicle->name . ' photo',
                    'sort_order' => $order++,
                ]);
            }
        }

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicle registered successfully.');
    }

    public function edit(Vehicle $vehicle): View
    {
        $vehicle->load('images');
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:vehicles,slug,' . $vehicle->id,
            'type' => 'nullable|string|max:100',
            'capacity' => 'required|integer|min:1|max:60',
            'luggage_capacity' => 'nullable|integer|min:0|max:40',
            'description' => 'nullable|string',
            'facilities' => 'nullable|string',
            'photo' => 'nullable|image|max:3072',
            'gallery_images.*' => 'nullable|image|max:3072',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $validated['status'] = $request->has('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('photo')) {
            if ($vehicle->photo && !str_starts_with($vehicle->photo, 'http')) {
                Storage::disk('public')->delete($vehicle->photo);
            }
            $validated['photo'] = $request->file('photo')->store('vehicles', 'public');
        }

        $vehicle->update($validated);

        if ($request->hasFile('gallery_images')) {
            $lastOrder = $vehicle->images()->max('sort_order') ?? 0;
            foreach ($request->file('gallery_images') as $file) {
                $imgPath = $file->store('vehicles/gallery', 'public');
                VehicleImage::create([
                    'vehicle_id' => $vehicle->id,
                    'image_path' => $imgPath,
                    'alt_text' => $vehicle->name . ' photo',
                    'sort_order' => ++$lastOrder,
                ]);
            }
        }

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function deleteImage(VehicleImage $image): RedirectResponse
    {
        if (!str_starts_with($image->image_path, 'http')) {
            Storage::disk('public')->delete($image->image_path);
        }
        $vehicleId = $image->vehicle_id;
        $image->delete();

        return redirect()->route('admin.vehicles.edit', $vehicleId)->with('success', 'Image removed from gallery.');
    }

    public function destroy(Vehicle $vehicle): RedirectResponse
    {
        if ($vehicle->photo && !str_starts_with($vehicle->photo, 'http')) {
            Storage::disk('public')->delete($vehicle->photo);
        }
        foreach ($vehicle->images as $img) {
            if (!str_starts_with($img->image_path, 'http')) {
                Storage::disk('public')->delete($img->image_path);
            }
        }
        $vehicle->delete();

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
