<?php

use App\Http\Controllers\Teacher\dashboard\QuestionController;
use App\Http\Controllers\Teacher\dashboard\OnlineClassController;
use App\Http\Controllers\Teacher\dashboard\ProfileController;
use App\Http\Controllers\Teacher\dashboard\QuizzController;
use App\Http\Controllers\Teacher\dashboard\StudentController;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:teacher'])->group(function () {

    // ========================================
    // Dashboard
    // ========================================

    Route::get('teacher/dashboard', function () {
        $sectionIds = Teacher::findOrFail(auth('teacher')->user()->id)->sections()->pluck('section_id');
        $count_sections = $sectionIds->count();
        $count_students = Student::whereIn('section_id', $sectionIds)->count();

        return view('pages.Teachers.dashboard.dashboard', compact('count_sections', 'count_students'));

        })->name('teacher.dashboard');


        Route::prefix('teacher')->group(function() {
            Route::resource('student', StudentController::class);
            Route::get('section', [StudentController::class, 'section'])->name('section');
            Route::post('attendance', [StudentController::class, 'attendance'])->name('attendance');
            Route::get('attendance/report', [StudentController::class, 'attendance_report'])->name('attendance.report');
            Route::post('attendance/search', [StudentController::class, 'attendance_search'])->name('attendance.search');
            Route::resource('quizze', QuizzController::class);
            Route::resource('question', QuestionController::class);


            Route::get('student_quizzed/{id}', [QuizzController::class, 'student_quizzed'])->name('student_quizzed');
            Route::post('repeat_quizze', [QuizzController::class, 'repeat_quizze'] )->name('repeat.quizze');


            Route::get('createManualonlineclass', [OnlineClassController::class, 'createManualonlineclass'] )->name('online_classe.createManual');
            Route::post('storeManualonlineclass', [OnlineClassController::class, 'storeManualonlineclass'] )->name('online_classe.storeManual');
            Route::resource('online_classe', OnlineClassController::class);

            Route::get('profile', [ProfileController::class, 'index'] )->name('profile.index');
            Route::put('profile/{id}', [ProfileController::class, 'update'] )->name('profile.update');

        });

});
