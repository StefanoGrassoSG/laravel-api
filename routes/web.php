<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//controllers 
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\PrivateController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;


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

//Public route
Route::get('/', [PublicController::class, 'index'])->name('home');

//private route
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('types', TypeController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::get('/dashboard', [PrivateController::class, 'dashboard'])->name('dashboard');
});


require __DIR__.'/auth.php';