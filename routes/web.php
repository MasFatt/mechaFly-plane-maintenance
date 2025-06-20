<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\AircraftExportController;
use App\Http\Controllers\MaintenanceImportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔁 Redirect root '/' langsung ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// ✅ Redirect dashboard ke halaman maintenance
Route::get('/dashboard', function () {
    return redirect()->route('maintenances.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Route setelah login, ini yang dituju dari RouteServiceProvider::HOME
Route::get('/maintenances', [MaintenanceController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('maintenances.index');

// ✈️ Export Aircraft
Route::get('/export/aircraft', [AircraftExportController::class, 'export'])
    ->middleware(['auth'])
    ->name('export.aircraft');

// 📥 Import Maintenance
Route::get('/maintenance/import', [MaintenanceImportController::class, 'showForm'])
    ->middleware(['auth'])
    ->name('maintenance.import.form');

Route::post('/maintenance/import', [MaintenanceImportController::class, 'import'])
    ->middleware(['auth'])
    ->name('maintenance.import');

// 🔐 Group route yang membutuhkan login
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource untuk maintenances
    Route::resource('maintenances', MaintenanceController::class);
});

require __DIR__ . '/auth.php';
