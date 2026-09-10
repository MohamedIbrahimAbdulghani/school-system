<?php

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

        return view('pages.Teachers.dashboard', compact('count_sections', 'count_students'));

        })->name('teacher.dashboard');

});
