<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Review;
use App\Models\Trip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = Review::with(['driver', 'trip'])->latest()->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create(): View
    {
        $drivers = Driver::where('status', true)->get();
        $trips = Trip::where('status', true)->get();
        return view('admin.reviews.create', compact('drivers', 'trips'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'country' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'driver_id' => 'nullable|exists:drivers,id',
            'trip_id' => 'nullable|exists:trips,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
        ]);

        $validated['status'] = $request->has('status');
        $validated['featured'] = $request->has('featured');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('reviews', 'public');
        }

        Review::create($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Customer review with travel photo recorded successfully.');
    }

    public function edit(Review $review): View
    {
        $drivers = Driver::where('status', true)->get();
        $trips = Trip::where('status', true)->get();
        return view('admin.reviews.edit', compact('review', 'drivers', 'trips'));
    }

    public function update(Request $request, Review $review): RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'country' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'driver_id' => 'nullable|exists:drivers,id',
            'trip_id' => 'nullable|exists:trips,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'remove_image' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
        ]);

        $validated['status'] = $request->has('status');
        $validated['featured'] = $request->has('featured');

        // Handle photo removal
        if ($request->boolean('remove_image')) {
            if ($review->image && !str_starts_with($review->image, 'http')) {
                Storage::disk('public')->delete($review->image);
            }
            $validated['image'] = null;
        }

        // Handle new photo upload
        if ($request->hasFile('image')) {
            if ($review->image && !str_starts_with($review->image, 'http')) {
                Storage::disk('public')->delete($review->image);
            }
            $validated['image'] = $request->file('image')->store('reviews', 'public');
        }

        unset($validated['remove_image']);
        $review->update($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review): RedirectResponse
    {
        if ($review->image && !str_starts_with($review->image, 'http')) {
            Storage::disk('public')->delete($review->image);
        }

        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
