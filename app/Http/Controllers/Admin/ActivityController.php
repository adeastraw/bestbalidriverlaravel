<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(): View
    {
        $activities = Activity::orderBy('sort_order', 'asc')->paginate(15);
        return view('admin.activities.index', compact('activities'));
    }

    public function create(): View
    {
        return view('admin.activities.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:activities,slug',
            'location' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:3072',
            'status' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $validated['status'] = $request->has('status');
        $validated['featured'] = $request->has('featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('activities', 'public');
            $validated['image'] = $path;
        }

        Activity::create($validated);

        return redirect()->route('admin.activities.index')->with('success', 'Tourist activity created successfully.');
    }

    public function edit(Activity $activity): View
    {
        return view('admin.activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:activities,slug,' . $activity->id,
            'location' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:3072',
            'status' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $validated['status'] = $request->has('status');
        $validated['featured'] = $request->has('featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            if ($activity->image && !str_starts_with($activity->image, 'http')) {
                Storage::disk('public')->delete($activity->image);
            }
            $validated['image'] = $request->file('image')->store('activities', 'public');
        }

        $activity->update($validated);

        return redirect()->route('admin.activities.index')->with('success', 'Activity updated successfully.');
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        if ($activity->image && !str_starts_with($activity->image, 'http')) {
            Storage::disk('public')->delete($activity->image);
        }
        $activity->delete();

        return redirect()->route('admin.activities.index')->with('success', 'Activity deleted successfully.');
    }
}
