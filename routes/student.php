<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.role:student')->group(function () {

    // ========================================
    // Dashboard
    // ========================================

    Route::get('student/dashboard', function () {
        return view('pages.Students.dashboard');
    })->name('student.dashboard');

});