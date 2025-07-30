<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateHeroController;

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

Route::get('/', [IndexController::class, 'index'])->middleware('auth.custom');

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/forgot', [AuthController::class, 'forgot']);
Route::get('/password/reset', [AuthController::class, 'reset']);

Route::group(['prefix' => '/create'], function () {
    Route::group(['prefix' => '/hero'], function () {
        Route::get('/', [CreateHeroController::class, 'step1']);
    });
});
