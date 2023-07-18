<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/caursess', [App\Http\Controllers\API\CaurseController::class, 'store']);
Route::get('/caurses', [App\Http\Controllers\API\CaurseController::class, 'index']);
Route::get('/caurse/{id}', [App\Http\Controllers\API\CaurseController::class, 'getOne']);
//postman eken update krddi id eka ywnna oni url eke
Route::put('/caurse/{id}', [App\Http\Controllers\API\CaurseController::class, 'update']);
Route::delete('/delete/{id}', [App\Http\Controllers\API\CaurseController::class, 'delete']);

