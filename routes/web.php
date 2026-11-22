<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/halo/{nama}', function ($nama) {
    return 'Halo, ' . $nama . '!';
});
Route::get('/coba', function () {
    return view('coba');
});
Route::resource('buku', BukuController::class);

use App\Http\Controllers\AlatController;

Route::resource('alat', AlatController::class);
