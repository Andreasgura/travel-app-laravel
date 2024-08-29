<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TravelController;
use App\Http\Controllers\Admin\DayController;
use App\Http\Controllers\Admin\StageController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('travels', TravelController::class)->parameters(['travels' => 'travel']); 
    Route::get('days/create/{travel}', [DayController::class, 'create'])->name('days.create');
    Route::post('days/store/{travel}', [DayController::class, 'store'])->name('days.store');
    Route::get('days/edit/{travel}/{day}', [DayController::class, 'edit'])->name('days.edit');
    Route::put('days/update/{travel}/{day}', [DayController::class, 'update'])->name('days.update');
    Route::delete('days/destroy/{travel}/{day}', [DayController::class, 'destroy'])->name('days.destroy');
    Route::resource('travels.days.stages', StageController::class)->parameters(['travels' => 'travel', 'days' => 'day', 'stages' => 'stage']);

    //Route::resource('comics', ComicController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::fallback(function () {
    return redirect()->route('admin.dashboard');
});
