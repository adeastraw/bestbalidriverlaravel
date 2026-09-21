<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Driver;
use App\Models\Review;
use App\Models\Trip;
use App\Models\Vehicle;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'drivers' => Driver::count(),
            'vehicles' => Vehicle::count(),
            'trips' => Trip::count(),
            'activities' => Activity::count(),
            'reviews' => Review::count(),
        ];

        $recentTrips = Trip::latest()->take(5)->get();
        $recentReviews = Review::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentTrips', 'recentReviews'));
    }
}
