<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonsultasiController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');

Route::post('/konsultasi/diagnosis', [KonsultasiController::class, 'diagnosis'])->name('konsultasi.diagnosis');
