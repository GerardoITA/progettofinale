<?php

use App\Http\Controllers\ApartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
      
Route::middleware('auth:api')->group( function () {
    Route::resource('products', ProductController::class);
});
