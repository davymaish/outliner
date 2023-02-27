<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutlinerController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/outliner', [OutlinerController::class, 'index'])->name('outliner.index');

    Route::get('/outliner/create', [OutlinerController::class, 'create'])->name('outliner.create');
    Route::post('/outliner/store', [OutlinerController::class, 'store'])->name('outliner.store');
    Route::get('/outliner/edit/{id}', [OutlinerController::class, 'edit'])->name('outliner.edit');
    Route::post('/outliner/update/{id}', [OutlinerController::class, 'update'])->name('outliner.update');
});
