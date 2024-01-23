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
Route::middleware('auth')->prefix('student')->name('student')->group(function () {
    Route::get('/dashboard', function () {
        return view('student.courses.index');
    })->middleware(['auth', 'verified'])->name('.dashboard');

    Route::get('/courses/offer', function () {
        return view('student.courses.offer');
    })->middleware(['auth', 'verified'])->name('.courses.offer');
});