<?php

use App\Http\Controllers\BokorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PengrajinController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');
Route::get('/', function () {
    return view('welcome');
});


Route::get('/bokor', [BokorController::class, 'index']);
Route::get('/bokor/{id}', [BokorController::class, 'show']);

Route::resource('kategori', CategoryController::class)->except('show');
Route::resource('pengrajin', PengrajinController::class)->except('show');

require __DIR__.'/settings.php';
