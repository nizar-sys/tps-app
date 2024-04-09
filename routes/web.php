<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\VillageController;

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

# ------ Unauthenticated routes ------ #
Route::get('/', [AuthenticatedSessionController::class, 'create']);
require __DIR__ . '/auth.php';


# ------ Authenticated routes ------ #
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('home'); # dashboard

    Route::resource('users', UserController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('villages', VillageController::class);
    Route::resource('votings', TpsController::class);
    Route::resource('supports', SupportController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('logistics', LogisticController::class);
});
