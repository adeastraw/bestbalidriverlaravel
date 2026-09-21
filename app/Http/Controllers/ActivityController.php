<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Trip;
use App\Services\WhatsAppService;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(): View
    {
        $activities = Activity::where('status', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('activities.index', compact('activities'));
    }

    public function show(string $slug): View
    {
        $activity = Activity::where('slug', $slug)
            ->where('status', true)
            ->with(['trips'])
            ->firstOrFail();

        $relatedTrips = $activity->trips()->where('status', true)->take(3)->get();
        if ($relatedTrips->isEmpty()) {
            $relatedTrips = Trip::where('status', true)->take(3)->get();
        }

        $otherActivities = Activity::where('status', true)
            ->where('id', '!=', $activity->id)
            ->take(3)
            ->get();

        $whatsappUrl = WhatsAppService::url(WhatsAppService::activityMessage($activity));

        return view('activities.show', compact('activity', 'relatedTrips', 'otherActivities', 'whatsappUrl'));
    }
}
