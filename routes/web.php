<?php

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

Route::get('/profile', function () {
    return view('account-profile');
})->middleware(['auth'])->name('account-profile');

Route::get('/change-email', function () {
    return view('change-email');
})->middleware(['auth'])->name('change-email');

Route::get('/tools', function () {
    return view('tool-list');
})->middleware(['auth'])->name('tools');

require __DIR__.'/auth.php';

Route::controller(ToolController::class)->group(function(){
    Route::get('/tools', [ToolController::class, 'show']);
    Route::get('/tools/{id}', 'view');
});
