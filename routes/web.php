<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\AutoSuggestionController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     // return Inertia::render('Dashboard');
//     Route::get('/dashboard', [DashboardController::class, 'index']);
    
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth' ,'verified')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/auto-suggest', [DashboardController::class, 'autoSuggest'])->name('auto-suggest');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/auto-suggest', [AutoSuggestionController::class, 'suggest'])->name('auto-suggest');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/reporting', [ReportingController::class, 'index'])->name('reporting.index');
});



require __DIR__.'/auth.php';
