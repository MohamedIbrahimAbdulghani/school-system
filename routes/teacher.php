<?php


use App\Http\Controllers\Teacher\dashboard\StudentController;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.role:teacher')->group(function () {

    // ========================================
    // Dashboard
    // ========================================

    Route::get('teacher/dashboard', function () {
        $sectionIds = Teacher::findOrFail(auth('teacher')->user()->id)->sections()->pluck('section_id');
        $count_sections = $sectionIds->count();
        $count_students = Student::whereIn('section_id', $sectionIds)->count();

        return view('pages.Teachers.dashboard.dashboard', compact('count_sections', 'count_students'));

        })->name('teacher.dashboard');


    Route::resource('student', StudentController::class);
    Route::get('section', [StudentController::class, 'section'])->name('section');
    Route::post('attendance', [StudentController::class, 'attendance'])->name('attendance');
});