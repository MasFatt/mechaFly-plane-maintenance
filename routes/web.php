<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\AircraftExportController;
use App\Http\Controllers\MaintenanceImportController;

// Route untuk import maintenance
Route::get('/maintenance/import', [MaintenanceImportController::class, 'showForm'])->name('maintenance.import.form');
Route::post('/maintenance/import', [MaintenanceImportController::class, 'import'])->name('maintenance.import');

// Pastikan ada juga route untuk menampilkan data maintenance
// Contoh:
Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');


Route::get('/export/aircraft', [AircraftExportController::class, 'export'])->name('export.aircraft');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('maintenances', MaintenanceController::class);
});


require __DIR__.'/auth.php';
