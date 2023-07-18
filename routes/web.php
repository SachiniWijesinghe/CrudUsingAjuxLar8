<?php

use App\Http\Controllers\CaurseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/students', [StudentController::class, 'index']);
Route::post('/add-student', [StudentController::class, 'store']);
Route::get('editStudent/{id}', [StudentController::class, 'edit']);
Route::put('/update-student', [StudentController::class, 'update']);
Route::delete('/delete-student', [StudentController::class, 'delete']);


Route::get('/caurses', [CaurseController::class, 'index']);
Route::post('/add-caurse', [CaurseController::class, 'store']);
Route::get('editCaurse/{id}', [CaurseController::class, 'edit']);
Route::put('/update-caurse', [CaurseController::class, 'update']);
Route::delete('/delete-caurse', [CaurseController::class, 'delete']);

