<?php

use App\Http\Controllers\KendaraanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [KendaraanController::class, 'index']); 
Route::get('/kendaraan/add', function () {
    return view('add');
});
Route::resource('kendaraan',KendaraanController::class);