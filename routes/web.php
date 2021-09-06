<?php

use App\Http\Controllers\ClientController;
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
    Route::get('/client', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/client', [ClientController::class, 'store'])->name('clients.store');
    
    Route::prefix('/bank-drafts')->group(function () {
        Route::get('/bank-draft', [DraftCheckController::class, 'create'])->name('bank-draft.create');
        Route::post('/bank-draft', [DraftCheckController::class, 'store'])->name('bank-draft.store'); 
        Route::get('/{bank-draft}/edit', [DraftCheckController::class, 'edit'])->name('bank-draft.edit');
        Route::post('/{bank-draft}', [DraftCheckController::class, 'update'])->name('bank-draft.update');   
    });
});
