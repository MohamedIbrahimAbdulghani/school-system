<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.role:parent')->group(function () {

    // ========================================
    // Dashboard
    // ========================================

    Route::get('parent/dashboard', function () {
        return view('pages.Parents.dashboard');
    })->name('parent.dashboard');

});