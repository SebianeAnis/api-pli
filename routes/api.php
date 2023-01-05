<?php

use App\Http\Controllers\Api\GarageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/garage/{id}', [ GarageController::class, 'update' ])->name('garage.update');
Route::post('/garage', [ GarageController::class, 'store' ]  )->name('creer.garage');
Route::get('/garages', [ GarageController::class, 'index' ]  )->name('garages');
Route::get('/garage/{id}', [ GarageController::class, 'show' ])->name('garage.show');
Route::delete('/garage/{id}', [ GarageController::class, 'delete' ])->name('garage.delete');

