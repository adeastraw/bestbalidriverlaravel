<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DriverController as AdminDriverController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\TripController as AdminTripController;
use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;
use App\Models\Activity;
use App\Models\Driver;
use App\Models\Trip;
use App\Models\Vehicle;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/driver', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/driver/{slug}', [DriverController::class, 'show'])->name('drivers.show');

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/{slug}', [VehicleController::class, 'show'])->name('vehicles.show');

Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
Route::get('/trips/{slug}', [TripController::class, 'show'])->name('trips.show');

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/{slug}', [ActivityController::class, 'show'])->name('activities.show');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Protected Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('drivers', AdminDriverController::class);
    Route::resource('vehicles', AdminVehicleController::class);
    Route::delete('vehicles/images/{image}', [AdminVehicleController::class, 'deleteImage'])->name('vehicles.images.delete');
    Route::resource('trips', AdminTripController::class);
    Route::resource('activities', AdminActivityController::class);
    Route::resource('reviews', AdminReviewController::class);

    Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [AdminSettingController::class, 'update'])->name('settings.update');
});


/*
|--------------------------------------------------------------------------
| Sitemap
|--------------------------------------------------------------------------
*/

Route::get('/sitemap.xml', function () {
    $baseUrl = rtrim((string) config('app.url', url('/')), '/');
    if (app()->environment('production') || str_starts_with($baseUrl, 'https://')) {
        $baseUrl = preg_replace('/^http:\/\//i', 'https://', $baseUrl);
    }

    $urls = collect([
        [
            'loc' => $baseUrl,
            'lastmod' => now()->toDateString(),
            'changefreq' => 'daily',
            'priority' => '1.0',
        ],
        [
            'loc' => $baseUrl . '/trips',
            'lastmod' => now()->toDateString(),
            'changefreq' => 'weekly',
            'priority' => '0.9',
        ],
        [
            'loc' => $baseUrl . '/driver',
            'lastmod' => now()->toDateString(),
            'changefreq' => 'weekly',
            'priority' => '0.9',
        ],
        [
            'loc' => $baseUrl . '/vehicles',
            'lastmod' => now()->toDateString(),
            'changefreq' => 'weekly',
            'priority' => '0.8',
        ],
        [
            'loc' => $baseUrl . '/activities',
            'lastmod' => now()->toDateString(),
            'changefreq' => 'weekly',
            'priority' => '0.9',
        ],
        [
            'loc' => $baseUrl . '/about',
            'lastmod' => now()->toDateString(),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ],
        [
            'loc' => $baseUrl . '/reviews',
            'lastmod' => now()->toDateString(),
            'changefreq' => 'weekly',
            'priority' => '0.7',
        ],
        [
            'loc' => $baseUrl . '/contact',
            'lastmod' => now()->toDateString(),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ],
    ]);

    foreach (Trip::where('status', true)->get(['slug', 'updated_at']) as $item) {
        $urls->push([
            'loc' => $baseUrl . '/trips/' . $item->slug,
            'lastmod' => optional($item->updated_at)->toDateString(),
            'changefreq' => 'weekly',
            'priority' => '0.8',
        ]);
    }

    foreach (Driver::where('status', true)->get(['slug', 'updated_at']) as $item) {
        $urls->push([
            'loc' => $baseUrl . '/driver/' . $item->slug,
            'lastmod' => optional($item->updated_at)->toDateString(),
            'changefreq' => 'weekly',
            'priority' => '0.8',
        ]);
    }

    foreach (Vehicle::where('status', true)->get(['slug', 'updated_at']) as $item) {
        $urls->push([
            'loc' => $baseUrl . '/vehicles/' . $item->slug,
            'lastmod' => optional($item->updated_at)->toDateString(),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ]);
    }

    foreach (Activity::where('status', true)->get(['slug', 'updated_at']) as $item) {
        $urls->push([
            'loc' => $baseUrl . '/activities/' . $item->slug,
            'lastmod' => optional($item->updated_at)->toDateString(),
            'changefreq' => 'weekly',
            'priority' => '0.8',
        ]);
    }

    return response()
        ->view('sitemap', ['urls' => $urls])
        ->header('Content-Type', 'application/xml; charset=utf-8');
})->name('sitemap');
