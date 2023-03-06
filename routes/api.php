<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ImageController;
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

Route::get('/v1/apartments', [ApartmentController::class, 'index'])->name('apartments.index');
Route::get('/v1/apartments/{apartment}', [ApartmentController::class, 'show'])->name('apartments.show');
Route::delete('/v1/apartments/{apartment}', [ApartmentController::class, 'destroy'])->name('apartments.destroy');
Route::get('/v1/apartments/create', [ApartmentController::class, 'create'])->name('apartments.create');
Route::post('/v1/apartments/store', [ApartmentController::class, 'store'])->name('apartments.store');


// route image
Route::get('/v1/apartments/image/{apartment_id}',[ImageController::class, 'showImages']) -> name('apartment.image');
Route::delete('/v1/apartments/image/{image}',[ImageController::class, 'deleteImage']) -> name('image.delete');
