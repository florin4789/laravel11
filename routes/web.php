<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\VisitController;


Route::post('/send-notification', [NotificationController::class, 'create']);

Route::get('/', function () {
    return view('welcome');
});

//Route::post('/track-visit', [VisitController::class, 'trackVisit']);


// Public route (HOME page)
Route::get('/home', [PageController::class, 'home'])->name('home');

// Admin dashboard route
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

//Services route for authenticated users
Route::get('/services', [PageController::class, 'services'])
    ->middleware(['auth', 'verified'])
    ->name('services');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 //Admin routes (for editing content)
// Admin pages

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::post('/admin/pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::get('/admin/analytics', [VisitController::class, 'getAnalytics'])->name('analytics');
});

require __DIR__.'/auth.php';
