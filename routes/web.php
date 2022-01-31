<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use app\Models\siswa;


Route::get('/', [HomeController::class, 'index']);
Route::resource('siswa', SiswaController::class);