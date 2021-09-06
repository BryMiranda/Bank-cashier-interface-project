<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DraftCheckController;
use App\Http\Controllers\HomeController;
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
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, '__invoke'])->name('home');

Route::prefix('/clients')->group(function () {
    
    Route::get('/', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/create', [ClientController::class, 'store'])->name('clients.store');
    
    Route::prefix('/{client}/draft-checks')->group(function () {
        Route::get('/', [DraftCheckController::class, 'index'])->name('draft-checks.index');
        Route::get('/create', [DraftCheckController::class, 'create'])->name('draft-checks.create');
        Route::post('/create', [DraftCheckController::class, 'store'])->name('draft-checks.store'); 
        Route::get('/{draftCheck}/edit', [DraftCheckController::class, 'edit'])->name('draft-checks.edit');
        Route::post('/{draftCheck}', [DraftCheckController::class, 'update'])->name('draft-checks.update');   
    });
});
