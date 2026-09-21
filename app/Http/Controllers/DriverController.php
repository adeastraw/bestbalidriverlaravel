<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Services\WhatsAppService;
use Illuminate\View\View;

class DriverController extends Controller
{
    public function index(): View
    {
        $drivers = Driver::where('status', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('drivers.index', compact('drivers'));
    }

    public function show(string $slug): View
    {
        $driver = Driver::where('slug', $slug)
            ->where('status', true)
            ->with(['trips', 'reviews'])
            ->firstOrFail();

        $vehicles = Vehicle::where('status', true)->take(4)->get();
        $whatsappUrl = WhatsAppService::url(WhatsAppService::driverMessage($driver));

        return view('drivers.show', compact('driver', 'vehicles', 'whatsappUrl'));
    }
}
