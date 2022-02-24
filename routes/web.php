<?php

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

Route::get('/profile', function () {
    return view('account-profile');
})->middleware(['auth'])->name('account-profile');

Route::get('/change-email', function () {
    return view('change-email');
})->middleware(['auth'])->name('change-email');

require __DIR__.'/auth.php';
