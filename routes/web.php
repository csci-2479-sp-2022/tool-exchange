<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(ToolController::class)->group(function(){
    Route::get('/tools', [ToolController::class, 'show'])->name('tools');
    Route::get('/tools/{id}', 'view');
});

<<<<<<< HEAD
=======
Route::controller(AccountController::class)->group(function(){
    Route::get('/usertools', [AccountController::class, 'show'])->name('usertools');
    Route::get('/usertools/{id}', 'view');
});

>>>>>>> b72d12421e0aa8c214db1b1b17eed9cb82fa94ab
Route::get('/search-results', function () {
    return view('search-results');
});

require __DIR__.'/auth.php';
