<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Trip;
use App\Models\Vehicle;
use App\Services\WhatsAppService;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function index(): View
    {
        $vehicles = Vehicle::where('status', true)
            ->with(['images'])
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('vehicles.index', compact('vehicles'));
    }

    public function show(string $slug): View
    {
        $vehicle = Vehicle::where('slug', $slug)
            ->where('status', true)
            ->with(['images', 'trips'])
            ->firstOrFail();

        $drivers = Driver::where('status', true)->take(4)->get();
        $relatedTrips = Trip::where('status', true)->take(3)->get();
        $whatsappUrl = WhatsAppService::url(WhatsAppService::vehicleMessage($vehicle));

        return view('vehicles.show', compact('vehicle', 'drivers', 'relatedTrips', 'whatsappUrl'));
    }
}
