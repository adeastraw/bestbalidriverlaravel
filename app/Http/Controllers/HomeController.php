<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Driver;
use App\Models\Review;
use App\Models\Trip;
use App\Models\Vehicle;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredTrips = Trip::where('status', true)
            ->where('featured', true)
            ->with(['destinations'])
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();

        // Fallback if no featured trips explicitly marked
        if ($featuredTrips->isEmpty()) {
            $featuredTrips = Trip::where('status', true)
                ->with(['destinations'])
                ->orderBy('sort_order', 'asc')
                ->take(3)
                ->get();
        }

        $featuredDrivers = Driver::where('status', true)
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get();

        $featuredVehicles = Vehicle::where('status', true)
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get();

        $featuredActivities = Activity::where('status', true)
            ->where('featured', true)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();

        if ($featuredActivities->isEmpty()) {
            $featuredActivities = Activity::where('status', true)
                ->orderBy('sort_order', 'asc')
                ->take(3)
                ->get();
        }

        $reviews = Review::where('status', true)
            ->where('featured', true)
            ->with(['driver', 'trip'])
            ->take(3)
            ->get();

        return view('home.index', compact(
            'featuredTrips',
            'featuredDrivers',
            'featuredVehicles',
            'featuredActivities',
            'reviews'
        ));
    }
}
