<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Vehicle;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TripController extends Controller
{
    public function index(Request $request): View
    {
        $query = Trip::where('status', true)->with(['destinations']);

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }

        if ($request->filled('q')) {
            $searchTerm = $request->input('q');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('short_description', 'like', "%{$searchTerm}%")
                    ->orWhere('location', 'like', "%{$searchTerm}%");
            });
        }

        $trips = $query->orderBy('sort_order', 'asc')->paginate(9)->withQueryString();

        $categories = Trip::where('status', true)
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        $locations = Trip::where('status', true)
            ->whereNotNull('location')
            ->distinct()
            ->pluck('location');

        return view('trips.index', compact('trips', 'categories', 'locations'));
    }

    public function show(string $slug): View
    {
        $trip = Trip::where('slug', $slug)
            ->where('status', true)
            ->with([
                'destinations',
                'itineraries',
                'inclusions',
                'activities',
                'vehicles',
                'drivers',
            ])
            ->firstOrFail();

        $relatedTrips = Trip::where('status', true)
            ->where('id', '!=', $trip->id)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();

        $recommendedVehicle = $trip->vehicles->first() ?? Vehicle::where('status', true)->first();

        $whatsappUrl = WhatsAppService::url(WhatsAppService::tripMessage($trip));

        return view('trips.show', compact('trip', 'relatedTrips', 'recommendedVehicle', 'whatsappUrl'));
    }
}
