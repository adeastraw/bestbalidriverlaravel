<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Review;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $drivers = Driver::where('status', true)->orderBy('sort_order', 'asc')->take(4)->get();
        $reviews = Review::where('status', true)->where('featured', true)->take(3)->get();

        return view('about.index', compact('drivers', 'reviews'));
    }
}
