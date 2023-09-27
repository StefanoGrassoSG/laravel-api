<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//controllers
use App\Http\Controllers\Api\ProjectController;

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

Route::name('api.')->group(function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::name('projects.')
        ->group(function () {
        Route::get('/projects', [ProjectController::class, 'index'])->name('index');
        Route::get('/projects', [ProjectController::class, 'show'])->name('show');
    });
});

