<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = Review::where('status', true)
            ->with(['driver', 'trip'])
            ->latest()
            ->paginate(12);

        return view('reviews.index', compact('reviews'));
    }
}
