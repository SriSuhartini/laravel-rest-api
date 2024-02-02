<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('schedule.index');
    Route::get('/{id}', [MahasiswaController::class, 'show'])->name('schedule.show');
    Route::post('/', [MahasiswaController::class, 'store'])->name('schedule.store');
    Route::put('/{id}', [MahasiswaController::class, 'update'])->name('schedule.update');
    Route::delete('/{id}', [MahasiswaController::class, 'destroy'])->name('schedule.destroy');
});
