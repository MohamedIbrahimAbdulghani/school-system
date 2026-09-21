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

    Route::get('profile', [ProfileController::class, "index"])->name('profile');
    Route::put('profile_student/{id}', [ProfileController::class, 'update'] )->name('profile_student.update');
});