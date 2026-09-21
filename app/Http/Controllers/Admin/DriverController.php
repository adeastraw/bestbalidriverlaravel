<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DriverController extends Controller
{
    public function index(): View
    {
        $drivers = Driver::orderBy('sort_order', 'asc')->paginate(15);
        return view('admin.drivers.index', compact('drivers'));
    }

    public function create(): View
    {
        return view('admin.drivers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:drivers,slug',
            'photo' => 'nullable|image|max:3072',
            'short_bio' => 'nullable|string|max:300',
            'description' => 'nullable|string',
            'experience' => 'nullable|string|max:100',
            'languages' => 'nullable|string|max:255',
            'service_area' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $validated['status'] = $request->has('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('drivers', 'public');
            $validated['photo'] = $path;
        }

        Driver::create($validated);

        return redirect()->route('admin.drivers.index')->with('success', 'Driver profile created successfully.');
    }

    public function edit(Driver $driver): View
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:drivers,slug,' . $driver->id,
            'photo' => 'nullable|image|max:3072',
            'short_bio' => 'nullable|string|max:300',
            'description' => 'nullable|string',
            'experience' => 'nullable|string|max:100',
            'languages' => 'nullable|string|max:255',
            'service_area' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $validated['status'] = $request->has('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('photo')) {
            if ($driver->photo && !str_starts_with($driver->photo, 'http')) {
                Storage::disk('public')->delete($driver->photo);
            }
            $validated['photo'] = $request->file('photo')->store('drivers', 'public');
        }

        $driver->update($validated);

        return redirect()->route('admin.drivers.index')->with('success', 'Driver profile updated successfully.');
    }

    public function destroy(Driver $driver): RedirectResponse
    {
        if ($driver->photo && !str_starts_with($driver->photo, 'http')) {
            Storage::disk('public')->delete($driver->photo);
        }
        $driver->delete();

        return redirect()->route('admin.drivers.index')->with('success', 'Driver profile deleted successfully.');
    }
}
