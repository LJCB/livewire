<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Rutas generadas para funcionalidades de usuarios administradores
|
*/

/* Courses Routes */
Route::middleware('auth')->prefix('tutor')->name('tutor')->group(function () {
    Route::get('/dashboard', function () {
        return view('tutor.courses.index');

    })->middleware(['auth', 'verified'])->name('dashboard');

    // Route::prefix('courses')->name('.courses')->group(function () {
    //     Route::view('/', 'tutor.courses.index');
    // });
});