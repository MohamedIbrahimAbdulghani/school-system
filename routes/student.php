<?php

use App\Http\Controllers\Student\dashboard\ExamController;
use App\Http\Controllers\Student\dashboard\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:student'])->group(function () {

    // ========================================
    // Dashboard
    // ========================================

    Route::get('student/dashboard', function () {
        return view('pages.Students.dashboard');
    })->name('student.dashboard');


    Route::resource('student_exams', ExamController::class);

    Route::get('student/profile', [ProfileController::class, 'index'])->name('student.profile');
    Route::put('student/profile/{id}', [ProfileController::class, 'update'] )->name('student.profile.update');
});