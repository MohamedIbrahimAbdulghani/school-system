<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\Parent\dashboard\SonController;


Route::middleware(['auth:parent'])->group(function () {

    // ========================================
    // Dashboard
    // ========================================

    Route::get('parent/dashboard', function () {
        $sons = Student::where('parent_id', auth('parent')->user()->id)->get();
        return view('pages.Parents.dashboard', compact('sons'));
    })->name('parent.dashboard');


    Route::get('sons', [SonController::class, "index"])->name('sons.index');
    Route::get('sons/result/{id}', [SonController::class, "result"])->name('sons.result');


});