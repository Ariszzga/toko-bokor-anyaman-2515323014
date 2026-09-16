<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BokorController;

Route::inertia('/', 'Welcome')->name('home');
Route::get('/', function () {
    return view('welcome');
});


Route::get('/bokor', [BokorController::class, 'index']);
Route::get('/bokor/{id}', [BokorController::class, 'show']);

require __DIR__.'/settings.php';
