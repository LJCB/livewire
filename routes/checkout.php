<?php

use Illuminate\Support\Facades\Route;

Route::prefix('checkout')->name('checkout')->group(function () {
    Route::get('/{checkoutId}/register', function ($checkoutId) {
        return view('checkout.register')->with('courseId',  $checkoutId);
    })->name('.register');

    Route::get('/payment-modality/{checkoutId}', function ($checkoutId) {
        return view('checkout.payment-modality')->with('checkoutId',  $checkoutId);
    })->name('.payment-modality');

    Route::get('/payment/{checkoutId}', function ($checkoutId) {
        return view('checkout.payment')->with('checkoutId',  $checkoutId);
    })->name('.payment');
});


