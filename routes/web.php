<?php

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        $movieController = new App\Http\Controllers\MovieController();
        return $movieController->index();
    })->name('dashboard');

    Route::get('/', [App\Http\Controllers\MovieController::class, 'index'])->name('dashboard');

    Route::get('/dashboard', function () {
        $movieController = new App\Http\Controllers\MovieController();
        return $movieController->index();
    })->name('dashboard');

    Route::get('/dashboard', [App\Http\Controllers\MovieController::class, 'index'])->name('dashboard');
});

Route::prefix('movies')->group(function () {
    Route::post('/store', [App\Http\Controllers\MovieController::class, 'store'])->name('movies.store');
    Route::delete('/{id}', [App\Http\Controllers\MovieController::class, 'destroy'])->name('movies.destroy');
    Route::patch('/{id}/seen', [App\Http\Controllers\MovieController::class, 'toggleSeen'])->name('movies.toggleSeen');
    Route::patch('/{id}/date', [App\Http\Controllers\MovieController::class, 'updateWatch'])->name('movies.updateWatch');
    Route::post('/{id}/edit', [App\Http\Controllers\MovieController::class, 'edit'])->name('movies.edit');
});